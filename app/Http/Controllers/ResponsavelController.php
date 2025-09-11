<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChamadosRequest;
use App\Http\Requests\UpdateStatusRequest;

class ResponsavelController extends Controller
{
    public function index() {

        $responsavel = auth()->user();

        $chamadosEmAndamento = Chamado::where('responsavel_id', $responsavel->id)
        ->where('status', 'em_andamento')
        ->get();

        $chamadosRecentes = Chamado::where('responsavel_id', $responsavel->id)
        ->orderBy('updated_at')
        ->limit(5)
        ->get();

        $totalAceitos = Chamado::where('responsavel_id', $responsavel->id)->count();

        $totalConcluidos = Chamado::where('responsavel_id', $responsavel->id)
        ->where('status', 'concluida')
        ->count();

        $totalEmAndamento = Chamado::where('responsavel_id', $responsavel->id)
        ->where('status', 'em_andamento')
        ->count();

        return view('responsavel.dashboard', compact(
        'responsavel',
        'chamadosEmAndamento',
        'chamadosRecentes',
        'totalAceitos',
        'totalConcluidos',
        'totalEmAndamento'
    ));
    }

    public function fila() {

        $responsavel = auth()->user();

        $chamadosAbertos = Chamado::where('status', 'aberta')
        ->whereNull('responsavel_id')
        ->get();

        $chamadosAceitos = Chamado::where('responsavel_id', $responsavel->id)
        ->where('status', 'em_andamento')
        ->get();

        return view('responsavel.chamados.fila', [
            'chamadosAbertos' => $chamadosAbertos,
            'chamadosAceitos' => $chamadosAceitos,
        ]);
    }

    public function aceitar(Request $request, $id) {

        $responsavel = auth()->user();
        
        $chamado = Chamado::find($id);

        if (!$chamado) {
            return redirect()->back()->with('error', 'chamado não encontrado.');
        }

        if ($chamado->responsavel_id !== null) {
            return redirect()->back()->with('error', 'esse chamado já foi aceito por outro responsável.');
        }

        if ($chamado->status !== 'aberta') {
            return redirect()->back()->with('error', 'esse chamado não está mais disponível');
        }

        $chamado->responsavel_id = $responsavel->id;
        $chamado->status = 'em_andamento';
        $chamado->save();

        return redirect()->route('responsavel.chamados.fila')->with('message', 'Chamado aceito com sucesso.');

    }

    public function show(Chamado $chamado)
    {
        return view('responsavel.chamados.show', compact('chamado'));
    }

    public function edit(Chamado $chamado)
    {

        return view('responsavel.chamados.edit', compact('chamado'));
    }

    public function updateStatus(UpdateStatusRequest $request, Chamado $chamado)
    {

        $chamado->status = $request->status;

        if ($request->status === 'concluida') {
            $chamado->data_conclusao = now();
        }

        $chamado->save();

        return redirect()->back()->with('message', 'Status atualizado com sucesso.');
    }
}
