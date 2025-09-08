<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Ordem;
use Illuminate\Http\Request;
use App\Http\Requests\ClientesRequest;

class ClienteController extends Controller
{

    // Listar os clientes por nome

    public function index(Request $request) 
    {

        $nome = $request->input('nome');

        $query = Cliente::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'ILIKE', '%' . $request->input('nome') . '%');      // faz o filtro funcionar
        }


        $clients = $query->paginate(10)->withQueryString();
        
        return view('clientes', compact ('clients'));
    }

    // Exibe formulário de criação

        public function create()     
    {
        $clientes = Cliente::all();
        return view('cliente-create', compact('clientes'));
    }

    // Salvar um novo cliente

    public function store(ClientesRequest $request) 
    {

        $dadosValidados = $request->validated();
        $client = Cliente::create($dadosValidados);

        return redirect()->route('clientes.index')
            ->with('message', 'Cliente criado com sucesso.');
    }

    // Mostrar um cliente específico

    public function show(Cliente $client) 
    {
        $ordem = Ordem::where('cliente_id', $client->id)->latest()->first();
        return view('cliente-detalhe', compact ('client', 'ordem'));
    }

    public function edit(Cliente $client) 
    {
        return view('clientes-edit', compact ('client'));
    }

    // Atualizar um cliente já salvo

    public function update(ClientesRequest $request, Cliente $client) 
    {
        $client->update($request->validated());
        return redirect()->route('clientes.index')
                         ->with('message', 'Cliente atualizado com sucesso!');
    }

    // Apagar um cliente

    public function destroy(Cliente $client) 
    {
        $client->delete();
        return redirect()->route('clientes.index')
        ->with('message', 'Cliente apagado com sucesso.');
    }
}
