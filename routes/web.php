<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdemController;

Route::get('/', function () {
    return redirect()->route('login');
});

        // Ordens

Route::post('ordens', [OrdemController::class, 'store'])->name('ordens.store'); // Criar uma nova ordems

Route::get('ordens', [OrdemController::class, 'index'])->name('ordens.index'); // Lista de ordens

Route::get('ordens/{ordem}', [OrdemController::class, 'show'])->name('ordem.show'); // Detalhe da ordem

Route::get('ordens/{ordem}/edit', [OrdemController::class, 'edit'])->name('ordem.edit'); // Atualizar os clientes

Route::put('ordens/{ordem}', [OrdemController::class, 'update'])->name('ordem.update');

Route::get('ordens', [OrdemController::class, 'destroy'])->name('ordem.destroy'); // Destruir


        // Clientes

Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store'); // Criar novo clientes

Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index'); // Lista de clientes

Route::get('clientes/{client}', [ClienteController::class, 'show'])->name('clientes.show'); // Detalhe dos clientes

Route::get('clientes/{client}/edit', [ClienteController::class, 'edit'])->name('clientes.edit'); // Atualizar os clientes

Route::put('clientes/{client}', [ClienteController::class, 'update'])->name('clientes.update');

Route::get('clientes', [ClienteController::class, 'destroy'])->name('clientes.destroy'); // Destruir 


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
