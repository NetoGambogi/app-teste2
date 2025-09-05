<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdemController extends Controller
{

    public function index(Request $request)     // Lista ordens
    {

        $query = Ordem::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status); // filtro de ordens
        }

        $clientes = Cliente::all();
        $ordens = Ordem::with('cliente', 'user')->paginate(10);

        return view('ordens', compact('clientes', 'ordens'));
    }


    public function create()     // Exibe formulário de criação
    {
        $clientes = Cliente::all();
        return view('ordens.create', compact('clientes'));
    }


    public function store(Request $request)     // Salva nova ordem
    {
        $validar = $request->validate([
            'titulo' => 'required|min:3',
            'descricao' => 'nullable',
            'status' => 'in:aberta,em_andamento,concluida',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $validar['user_id'] = Auth::id() ?? 1; // temporário

        Ordem::create($validar);

        return redirect()->route('ordens.index')->with('message', 'Ordem criada com sucesso!');
    }

 
    public function show(Ordem $ordem)    // Mostra detalhes de uma ordem
    {
        $clientes = $ordem->cliente_id;
        return view('ordem-detalhe', compact('clientes', 'ordem'));
    }


    public function edit(Ordem $ordem)     // Exibe formulário de edição
    {
        $clientes = \App\Models\Cliente::all();
        return view('ordem-edit', compact('ordem', 'clientes'));
    }

 
    public function update(Request $request, Ordem $ordem)    // Atualiza ordem existente
    {
        $validar = $request->validate([
            'titulo' => 'required|min:3',
            'descricao' => 'nullable',
            'status' => 'in:aberta,em_andamento,concluida',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $ordem->update($validar);

        return redirect()->route('ordens.index')->with('message', 'Ordem atualizada com sucesso!');
    }

   
    public function destroy(Ordem $ordem)  // Exclui ordem
    {
        $ordem->delete();

        return redirect()->route('ordens.index')
        ->with('message', 'Ordem excluída com sucesso!');
    }
}

