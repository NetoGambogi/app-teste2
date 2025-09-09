<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $usuarios = User::where('role', '!=', 'admin')->get();
        return view('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only('name', 'email', 'role'));
        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuário excluido com sucesso');
    }

    public function chamados()
    {
        $chamados = Chamado::all();

        return view('admin.chamados.index', compact('chamados'));
    }

    public function destroyChamado(Chamado $chamado)
    {
        $chamado->delete();
        return redirect()->route('admin.chamados.index')->with('success', 'Chamado excluído.');
    }
}
