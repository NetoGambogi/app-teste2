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

    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users.index', compact('users'));
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
        return redirect()->route('admin.usuarios.show', $user)->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuário excluido com sucesso');
    }


    // Funções dos chamados 

    public function chamados()
    {
        $chamados = Chamado::all();

        return view('admin.chamados.index', compact('chamados'));
    }

    public function showChamado(Chamado $chamado)
    {
        return view('admin.chamados.show', compact('chamado'));
    }

    public function editChamado(Chamado $chamado)
    {

    return view('admin.chamados.edit', compact('chamado'));
    }

    public function updateChamado(UpdateChamadoRequest $request, Chamado $chamado) 
    {
        $chamado->update($request->validated());

        return redirect()->route('admin.chamados.show', $chamado)->with('message', 'Chamado atualizado com sucesso!');
    }

    public function destroyChamado(Chamado $chamado)
    {
        $chamado->delete();
        return redirect()->route('admin.chamados.index')->with('success', 'Chamado excluído.');
    }


}
