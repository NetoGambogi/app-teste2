<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('ordens', function () {
    return view('ordens');
});

Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('clientes/{client}', [ClienteController::class, 'show'])->name('clientes.show');
Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
