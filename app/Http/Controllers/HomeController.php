<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return match($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'responsavel' => redirect()->route('responsavel.dashboard'),
            'requerente' => redirect()->route('requerente.dashboard'),
            default => redirect()->route('home')
        };
    }
}
