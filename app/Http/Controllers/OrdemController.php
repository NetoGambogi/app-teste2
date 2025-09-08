<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrdemRequest;

class OrdemController extends Controller
{

    public function index(Request $request)     // Lista ordens
    {

        $query = Ordem::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status); // filtro de ordens
        }

        $clientes = Cliente::all();

        $ordens = $query->with('cliente', 'user')->paginate(10)->withQueryString();

        return view('ordens', compact('clientes', 'ordens'));
    }


    public function create()     // Exibe formulário de criação
    {
        $clientes = Cliente::all();
        return view('ordem-create', compact('clientes'));
    }


    public function store(OrdemRequest $request)     // Salva nova ordem
    {
        
        $dadosValidados = $request->validated();
        $ordem = Ordem::create($dadosValidados);

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

 
    public function update(OrdemRequest $request, Ordem $ordem)    // Atualiza ordem existente
    {
        $ordem->update($request->validated());
        return redirect()->route('ordens.index')->with('message', 'Ordem atualizada com sucesso!');
    }

   
    public function destroy(Ordem $ordem)  // Exclui ordem
    {
        $ordem->delete();

        return redirect()->route('ordens.index')
        ->with('message', 'Ordem excluída com sucesso!');
    }
}

