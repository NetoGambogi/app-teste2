<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\User;
use Illuminate\Http\Request;

class RequerenteController extends Controller
{
    public function create() 
    {
        return view('chamados.chamado-create');
    }

    public function store(ChamadosRequest $request) {
        
        $dadosValidados = $request->validated();
        $chamado = Chamado::create($dadosValidados);

        return redirect()->route('home.index') 
        ->with('message', 'Chamado criado com sucesso!');
    }
}
