<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = $request->user();
        if (!$user->ativo) {
            Auth::logout();
            return back()->withErrors(['email' => 'Usuário inativo']);
        }

        $request->session()->regenerate();

        $role = Auth::user()->role;

        $redirectMap = [
            'admin' => 'admin.dashboard',
            'responsavel' => 'responsavel.dashboard',
            'requerente' => 'requerente.dashboard',
        ];

    return redirect()->route($redirectMap[$role]);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
