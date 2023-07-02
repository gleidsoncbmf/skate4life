<?php

namespace App\Http\Controllers;

use App\Models\Modalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModalidadeController extends Controller
{
    public function index()
    {
        // Retorna as modalidades criadas pelo usuário logado
        $modalidades = Modalidade::where('user_id', Auth::id())->get();

        return view('modalidades.index', compact('modalidades'));
    }

    public function create()
    {
        return view('modalidades.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $modalidade = new Modalidade;
        $modalidade->nome = $request->nome;
        $modalidade->user_id = Auth::id();
        $modalidade->save();

        return redirect()->route('modalidades.index')->with('success', 'Modalidade criada com sucesso!');
    }

    public function edit($id)
    {
        $modalidade = Modalidade::where('user_id', Auth::id())->find($id);

        if (!$modalidade) {
            return redirect()->route('modalidades.index')->with('error', 'Modalidade não encontrada!');
        }

        return view('modalidades.edit', compact('modalidade'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $modalidade = Modalidade::where('user_id', Auth::id())->find($id);

        if (!$modalidade) {
            return redirect()->route('modalidades.index')->with('error', 'Modalidade não encontrada!');
        }

        $modalidade->nome = $request->nome;
        $modalidade->save();

        return redirect()->route('modalidades.index')->with('success', 'Modalidade atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $modalidade = Modalidade::where('user_id', Auth::id())->find($id);

        if (!$modalidade) {
            return redirect()->route('modalidades.index')->with('error', 'Modalidade não encontrada!');
        }

        $modalidade->delete();

        return redirect()->route('modalidades.index')->with('success', 'Modalidade deletada com sucesso!');
    }
}
