<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index(Request $request) // Listar os clientes por nome
    {
        $query = Cliente::query();

        if ($request->has('nome')) {
            $query->where('nome', 'ilike', "%{$request->nome}%");
        }

        $clients = $query->paginate(20);
        return view('clientes', compact ('clients'));
    }

    public function store(Request $request) // Salvar um novo cliente (TODO: Não está enviando para o banco de dados)
    {
        $validar = $request->validate([
            'nome' => 'required|min:3',
            'email' => 'email|unique:clientes,email',
            'telefone' => 'nullable'
        ]);

        $client = Cliente::create($validar);
        return redirect()->route('clientes.index')
            ->with('sucesso', 'Cliente criado com sucesso.');
    }

    public function show(Cliente $client) // Mostrar um cliente específico
    {
        return view('cliente-detalhe', compact ('client'));
    }

    public function update(Request $request, Client $client) // Atualizar um cliente já salvo
    {
        $validar = $request->validate([
            'nome' => 'required|min:3',
            'email' => 'email|unique:clients,email,'.$client->id,
            'telefone' => 'nullable'
        ]);

        $client->update($validar);
        return redirect()->route('clientes')
                         ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Client $client) // Apagar um cliente
    {
        $client->delete();
        return redirect()->route('clientes')
        ->with('sucesso', 'cliente apagado com suceeso.');
    }
}
