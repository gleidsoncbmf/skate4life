<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use App\Models\Inscricao;
use App\Models\Categoria;
use App\Models\Modalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CampeonatoController extends Controller
{
    public function index()
    {
        // Apenas os campeonatos do usuário logado
        $user = Auth::user();
        $campeonatos = $user->campeonatos;
    
        return view('campeonatos.index', compact('campeonatos'));
    }

    public function create()
    {
        $modalidades = Modalidade::where('user_id', Auth::id())->get();
        $categorias = Categoria::where('user_id', Auth::id())->get();
        return view('campeonatos.create', compact('categorias', 'modalidades'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'local' => 'required|max:255',
            'data' => 'required|date',
            'endereco' => 'required|max:255',
            'cartaz' => 'image|max:2048',
            'telefone' => 'required|max:255',
            'valor' => 'required|max:255',
            'pix' => 'required|max:255',
            'modalidades' => 'required|array|min:1',
            'modalidades.*' => 'exists:modalidades,id',
            'categorias' => 'required|array|min:1',
            'categorias.*' => 'exists:categorias,id',
        ]);
    
        $user = Auth::user();
    
        $campeonato = $user->campeonatos()->create($validatedData);
    
        // Salvar as relações do campeonato com as categorias e modalidades
        $campeonato->categorias()->sync($validatedData['categorias']);
        $campeonato->modalidades()->sync($validatedData['modalidades']);
    
        // Salvar a imagem do cartaz do campeonato, se houver
        if ($request->hasFile('cartaz')) {
            $cartaz = $request->file('cartaz')->store('public/cartazes');
            $campeonato->cartaz = $cartaz;
            $campeonato->save();
        }
    
        return redirect()->route('dashboard');
    }
    

    public function show($id)
    {
        $campeonato = Campeonato::findOrFail($id);
        $user = Auth::user();
        if (!$user->campeonatos->contains($campeonato)) {
            abort(404);
        }
    
        // Resgata as modalidades associadas ao campeonato
        $modalidades = $campeonato->modalidades;
    
        // Resgata as categorias associadas ao campeonato
        $categorias = $campeonato->categorias;
    
        return view('campeonatos.show', compact('campeonato', 'modalidades', 'categorias'));
    }
    public function showPublic($id)
    {
        $campeonato = Campeonato::findOrFail($id);

        // Resgata as modalidades associadas ao campeonato
        $modalidades = $campeonato->modalidades;
    
        // Resgata as categorias associadas ao campeonato
        $categorias = $campeonato->categorias;
    
        return view('campeonatos.showpublic', compact('campeonato', 'modalidades', 'categorias'));
    }
    public function update(Request $request, $id)
    {
        $campeonato = Campeonato::findOrFail($id);

        // Verificar se o usuário logado é o organizador do campeonato
        if ($campeonato->user_id != Auth::id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'local' => 'required|max:255',
            'data' => 'required|date',
            'endereco' => 'required|max:255',
            'cartaz' => 'image|max:2048',
            'telefone' => 'required|max:255',
            'valor' => 'required|max:255',
            'pix' => 'required|max:255',
            'modalidades' => 'required|array|min:1',
            'modalidades.*' => 'exists:modalidades,id',
            'categorias' => 'required|array|min:1',
            'categorias.*' => 'exists:categorias,id',
        ]);

        $campeonato->update($validatedData);

        // Atualizar as relações do campeonato com as categorias e modalidades
        $campeonato->categorias()->sync($validatedData['categorias']);
        $campeonato->modalidades()->sync($validatedData['modalidades']);

        // Atualizar a imagem do cartaz do campeonato, se houver
        if ($request->hasFile('cartaz')) {
            $cartaz = $request->file('cartaz')->store('public/cartazes');
            $campeonato->cartaz = $cartaz;
            $campeonato->save();
        }

        return redirect()->route('campeonato.show', $campeonato);
    }

    


    public function destroy($id)
    {
        // Busca o campeonato a ser excluído
        $campeonato = Campeonato::findOrFail($id);
    
        // Verifica se o usuário é o proprietário do campeonato
        if (Auth::id() !== $campeonato->user_id) {
            abort(403, 'Você não tem permissão para excluir este campeonato.');
        }
    
        // Remove as associações do campeonato com as categorias e modalidades       
        $campeonato->categorias()->detach();
        $campeonato->modalidades()->detach();
       
    
        // Exclui o campeonato
        $campeonato->delete();
    
        // Exclui a imagem do cartaz do campeonato, se houver
        if ($campeonato->cartaz) {
            Storage::delete($campeonato->cartaz);
        }
    
        return redirect()->route('campeonato.index');
    }
    public function indexPublic()
    {
        $campeonatos = Campeonato::all();

        return view('campeonatos.indexPublic', compact('campeonatos'));
    }
    public function inscricoes($id)
    {
        $campeonato = Campeonato::findOrFail($id);
    
        // Verifica se há um usuário autenticado e se ele é o proprietário do campeonato
        if (Auth::check() && Auth::user()->id == $campeonato->user_id) {
            $inscricoes = $campeonato->inscricoes;
            return view('campeonatos.inscricoes', compact('campeonato', 'inscricoes'));
        } else {
            // Exibe uma mensagem de erro e redireciona o usuário para a página de login
            return abort(403, 'Você não tem permissão para acessar este campeonato.');
        }
    }
    public function edit($id)
    {
        $campeonato = Campeonato::findOrFail($id);

        // Verifica se o usuário é o proprietário do campeonato
        if (Auth::id() !== $campeonato->user_id) {
            abort(403, 'Você não tem permissão para editar este campeonato.');
        }

            $user = Auth::user();
            $categorias = Categoria::where('user_id', $user->id)->get();
            $modalidades = Modalidade::where('user_id', $user->id)->get();
            return view('campeonatos.edit', compact('campeonato', 'categorias', 'modalidades'));
        }

    public function inscricoesPublic($id)
    {
        $campeonato = Campeonato::findOrFail($id);
        $inscricoes = $campeonato->inscricoes;
            
        return view('campeonatos.inscricoesPublic', compact('campeonato', 'inscricoes'));
    }        
        

    
}
