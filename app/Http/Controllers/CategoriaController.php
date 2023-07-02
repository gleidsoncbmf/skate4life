<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function index()
    {
        // Retorna as categorias criadas pelo usuário logado
        $categorias = Categoria::where('user_id', Auth::id())->get();

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $categoria = new Categoria;
        $categoria->nome = $request->nome;
        $categoria->user_id = Auth::id();
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $categoria = Categoria::where('user_id', Auth::id())->find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('error', 'Categoria não encontrada!');
        }

        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $categoria = Categoria::where('user_id', Auth::id())->find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('error', 'Categoria não encontrada!');
        }

        $categoria->nome = $request->nome;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $categoria = Categoria::where('user_id', Auth::id())->find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('error', 'Categoria não encontrada!');
        }

        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria deletada com sucesso!');
    }
}
