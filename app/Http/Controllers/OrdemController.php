<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdemController extends Controller
{
 public function index(Request $request) // Lista as ordens
    {
        $query = Ordem::with('cliente', 'user');

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('cliente_nome')) {
            $query->whereHas('cliente', function ($q) use ($request) {
                $q->where('nome', 'ilike', "%{$request->cliente_nome}%");
            });
        }

        $ordem = $query->paginate(10);
        return response()->json($ordem);
    }

    public function store(Request $request) // Cria uma nova ordem
    {
        $validar = $request->validate([
            'titulo' => 'required|min:3',
            'descricao' => 'nullable',
            'status' => 'in:aberta,em_andamento,concluida',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $validar ['user_id'] = Auth::id() ?? 1; // temporário

        $ordem = Ordem::create($validar);
        return response()->json($ordem, 201);
    }

    public function show(Ordem $ordem) // Mostra os detalhes de uma ordem
    {
        return response()->json($ordem->load('cliente', 'user'));
    }

    public function update(Request $request, Ordem $ordem) // Atualiza uma ordem
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            return response()->json(['error' => 'Somente admins podem editar.'], 403);
        }

        $validar = $request->validate ([
            'titulo' => 'required|min:3',
            'descricao' => 'nullable',
            'status' => 'in:aberta,em_andamento,concluida',
            'cliente_id' => 'required|exists:clientes,id',
        ]);

        $ordem->update($validar);
        return response()->json($ordem);
    }

    public function destroy(Ordem $ordem) // Apaga uma ordem
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            return response()->json(['error' => 'Somente admins podem deletar.'], 403);
        }

        $ordem->delete();
        return response()->json(null, 204);
    }
}

