<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChamadosRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class RequerenteController extends Controller
{
    use AuthorizesRequests;

    public function index(): View
    {
        $userId = Auth::id();

        $chamados = Chamado::where('requerente_id', $userId)
            ->latest()
            ->paginate(10);
        
        return view('requerente.dashboard', compact('chamados'));
    }

    public function create() 
    {
        return view('requerente.chamados.create');
    }

    public function store(ChamadosRequest $request) {
        
        // 1. Pegue os dados validados do formulário (seu código já faz isso)
        $dadosValidados = $request->validated();

        // 2. CRIE UM NOVO ARRAY combinando os dados validados com os dados do sistema
        $dadosParaSalvar = array_merge($dadosValidados, [
            'requerente_id' => Auth::id(), // Adiciona o ID do usuário logado
            'status' => 'aberta',         // Define o status inicial como 'aberto'
        ]);

        // 3. Use o array COMPLETO para criar o chamado
        $chamado = Chamado::create($dadosParaSalvar);

        return redirect()->route('requerente.dashboard') 
        ->with('message', 'Chamado criado com sucesso!');
    }

    public function show(Chamado $chamado): View {
        

    if ($chamado->requerente_id !== Auth::id()) {
        abort(403);
    }

        return view('requerente.chamados.show', compact('chamado'));
    }

    public function destroy(Chamado $chamado) {

        $chamado -> delete();

        return redirect()->route('requerente.dashboard')
        ->with('message', 'Chamado deletado com sucesso!');
    }
    
}
