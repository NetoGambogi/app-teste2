<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdemController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');  // Botão para deslogar o usuário e retornar a tela de login
})->name('logout');

        // Ordens

Route::get('ordens', [OrdemController::class, 'index'])->name('ordens.index'); // Lista de ordens
Route::get('ordens/{ordem}', [OrdemController::class, 'show'])->name('ordem.show'); // Detalhe da ordem

        // Necessário permissão is_admin

Route::middleware(['auth', 'admin'])->group(function () {
    
Route::post('ordens', [OrdemController::class, 'store'])->name('ordens.store'); // Criar uma nova ordem
Route::get('ordens/{ordem}/edit', [OrdemController::class, 'edit'])->name('ordem.edit'); // Atualizar ordem
Route::put('ordens/{ordem}', [OrdemController::class, 'update'])->name('ordem.update');
Route::delete('ordens/{ordem}', [OrdemController::class, 'destroy'])->name('ordem.destroy'); // Apagar ordem

});

        // Clientes

Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index'); // Lista de clientes
Route::get('clientes/{client}', [ClienteController::class, 'show'])->name('clientes.show'); // Detalhe dos clientes

Route::middleware(['auth', 'admin'])->group(function () {

Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store'); // Criar novo clientes
Route::get('clientes/{client}/edit', [ClienteController::class, 'edit'])->name('clientes.edit'); // Atualizar cliente
Route::put('clientes/{client}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('clientes/{client}', [ClienteController::class, 'destroy'])->name('clientes.destroy'); // Apagar cliente

});

        // Autenticação - Breeze
        
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
