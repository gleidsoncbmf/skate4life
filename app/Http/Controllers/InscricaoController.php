<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\Modalidade;
use App\Models\Categoria;
use App\Models\Campeonato;

class InscricaoController extends Controller
{
public function create($id)
{
    $campeonato = Campeonato::findOrFail($id);
    $modalidades = $campeonato->modalidades;
    $categorias = $campeonato->categorias;

    return view('inscricoes.create', compact('modalidades', 'categorias', 'campeonato'));
}

public function store(Request $request, $id)
{
    $validatedData = $request->validate([
        'nome' => 'required',
        'apelido' => '',
        'email' => 'required|email',
        'telefone' => 'required',
        'instagram' => 'required',
        'modalidade_id' => 'required',
        'categoria_id' => 'required',
    ]);

    $campeonato = Campeonato::findOrFail($id);

    $inscricao = new Inscricao($validatedData);
    $inscricao->campeonato_id = $campeonato->id;
    $inscricao->pagamento = false;
    $inscricao->save();

    return redirect()->route('inscricao.pagamento', [$campeonato, $inscricao]);
}

public function alteraPagamento($id) {
    $inscricao = Inscricao::find($id);
    $inscricao->pagamento = !$inscricao->pagamento;
    $inscricao->save();
    
    return redirect()->back();
}

public function pagamento($id)
    {
        $campeonato = Campeonato::findOrFail($id);

        // Resgata as modalidades associadas ao campeonato
        $modalidades = $campeonato->modalidades;
    
        // Resgata as categorias associadas ao campeonato
        $categorias = $campeonato->categorias;
    
        return view('inscricoes.pagamento', compact('campeonato', 'modalidades', 'categorias'));
    }


}
