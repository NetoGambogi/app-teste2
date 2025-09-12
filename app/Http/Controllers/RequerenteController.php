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

    public function index(Request $request): View
    {   
        $requerente = auth()->user();

        $query = Chamado::where('requerente_id', $requerente->id);

        if ($request->filled('chamado_id')) {
            $query->where('chamado_id', 'ILIKE', '%' . $request->input('chamado_id') . '%');
        }

        $chamados = $query->latest()->paginate(5)->withQueryString();


        $chamadosRealizados = Chamado::where('requerente_id', $requerente->id)
        ->count();

        $chamadosEmAndamento = Chamado::where('requerente_id', $requerente->id)
        ->where('status', 'em_andamento')
        ->count();

        $chamadosConcluidos = Chamado::where('requerente_id', $requerente->id)
        ->where('status', 'concluida')
        ->count();

        $chamadosNaFila = Chamado::where('requerente_id', $requerente->id)
        ->where('status', 'aberta')
        ->count();
        
        return view('requerente.dashboard', compact('chamados',
        'requerente',
        'chamadosRealizados',
        'chamadosEmAndamento',
        'chamadosNaFila',
        'chamadosConcluidos',
        'chamados'
    ));
    }

    public function create() 
    {
        return view('requerente.chamados.create');
    }

    public function store(ChamadosRequest $request) {
        
        // 1. Pegue os dados validados do formulário 
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

    public function edit(Chamado $chamado) {
        return view('requerente.chamados.edit', compact('chamado'));
    }

    public function update(ChamadosRequest $request, Chamado $chamado) {

        $chamado->update($request->validated());
        return redirect()->route('requerente.chamados.show', $chamado)->with('message', 'Chamado atualizado com sucesso!');
    }

    public function destroy(Chamado $chamado) {

        $chamado -> delete();

        return redirect()->route('requerente.dashboard')
        ->with('message', 'Chamado deletado com sucesso!');
    }
    
}
