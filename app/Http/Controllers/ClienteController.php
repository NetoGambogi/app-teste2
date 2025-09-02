<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index(Request $request) // Listar os clientes por nome
    {
        $query = Client::query();

        if ($request->has('nome')) {
            $query->where('nome', 'ilike', "%{$request->nome}%");
        }

        $clients = $query->paginate(10);
        return response()->json($clients);
    }

    public function store(Request $request) // Salvar um novo cliente
    {
        $validar = $request->validate([
            'nome' => 'required|min:3',
            'email' => 'email|unique:clients,email',
            'telefone' => 'nullable'
        ]);

        $client = Client::create($validar);
        return response()->json($client, 201);
    }

    public function show(Client $client) // Mostrar um cliente específico
    {
        return response()->json($client);
    }

    public function update(Request $request, Client $client) // Atualizar um cliente já salvo
    {
        $validar = $request->validate([
            'nome' => 'required|min:3',
            'email' => 'email|unique:clients,email,'.$client->id,
            'telefone' => 'nullable'
        ]);

        $client->update($validar);
        return response()->json($client);
    }

    public function destroy(Client $client) // Apagar um cliente
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
