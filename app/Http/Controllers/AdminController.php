<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateChamadoRequest;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Funções dos usuários

    public function index(Request $request)
    {

    $query = User::where('role', '!=', 'admin');

    if ($request->filled('name')) {
        $query->where('name', 'ILIKE', '%' . $request->input('name') . '%');
    }

    if ($request->filled('role')) {
        $query->where('role', $request->input('role'));
    }

    $usersCadastrados = User::count();

    $usersRequerentes = User::where('role', 'requerente')
    ->count();

    $usersResponsaveis = User::where('role', 'responsavel')
    ->count();

    $users = $query->paginate(8)->withQueryString();

        return view('admin.users.index', compact('users',
    'usersCadastrados',
    'usersRequerentes',
    'usersResponsaveis'));
    }

    public function show(User $user, Chamado $chamado)
    {

    $chamado = Chamado::where('responsavel_id', $user->id)
    ->orWhere('requerente_id', $user->id)
    ->latest()->first();

        return view('admin.users.show', compact('user','chamado'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('admin.usuarios.show', $user)->with('message', 'Usuário atualizado com sucesso.');
    }

    public function desativar(User $user)
    {
        if ($user -> role !== 'admin') {
            $user -> ativo = false;
            $user -> save();
        }
        return redirect()->back()->with('message', 'Usuário desativado com sucesso');
    }

    public function ativar(User $user)
    {
        if ($user -> role !== 'admin') {
            $user -> ativo = true;
            $user -> save();
        }
        return redirect()->back()->with('message', 'Usuário reativado com sucesso.');
    }


    // Funções dos chamados 

    public function chamados(Request $request)
    {

    $query = Chamado::query();

    if ($request->filled('chamado_id')) {
        $query->where('chamado_id', 'ILIKE', '%' . $request->input('chamado_id') . '%');
    }

    if ($request->filled('status')) {
        $query->where('status', $request->input('status'));
    }

    $totalChamados = Chamado::count();

    $chamadosFila = Chamado::where('status', 'aberta')
    ->count();

    $chamadosConcluido = Chamado::where('status', 'concluida')
    ->count();

    $chamados = $query->paginate(8)->withQueryString();

        return view('admin.chamados.index', compact('chamados',
    'totalChamados',
    'chamadosFila',
    'chamadosConcluido',));
    }

    public function showChamado(Chamado $chamado)
    {
        return view('admin.chamados.show', compact('chamado'));
    }

    public function editChamado(Chamado $chamado, Request $request)
    {
    $requerentes = User::where('role', 'requerente')->get();
    $responsaveis = User::where('role', 'responsavel')->get();

    return view('admin.chamados.edit', compact('chamado', 'requerentes', 'responsaveis'));
    }

        public function updateChamado(UpdateChamadoRequest $request, Chamado $chamado) 
    {
        $chamado->update($request->validated());

        return redirect()->route('admin.chamados.show', $chamado)->with('message', 'Chamado atualizado com sucesso!');
    }

        public function destroyChamado(Chamado $chamado)
    {
        $chamado->delete();
        return redirect()->route('admin.chamados.index')->with('message', 'Chamado excluído.');
    }

        public function retornar(Chamado $chamado) 
    {
        $chamado->retornarFila();
        return back()->with('message', 'chamado retornou para fila.');
    }


}
