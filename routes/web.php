<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequerenteController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminChamadoController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');  // Botão para deslogar o usuário e retornar a tela de login
})->name('logout');

        // Página inicial

Route::get('home', [HomeController::class, 'index'])->name('home.index');

        // Rotas do requerente: 

Route::middleware(['auth', 'role:requerente'])->prefix('requerente')->name('requerente.')->group(function () {
        Route::get('/dashboard', [RequerenteController::class, 'index'])->name('dashboard');
        Route::get('/chamados/novo', [RequerenteController::class,'create'])->name('chamados.create');
        Route::post('/chamados', [RequerenteController::class, 'store'])->name('chamados.store');
        Route::get('/chamados/{id}', [RequerenteController::class, 'show'])->name('chamados.show');
});

        // Rotas do responsável
Route::middleware(['auth', 'role:responsavel,admin'])->prefix('responsavel')->name('responsavel.')->group(function () {
        Route::get('/dashboard', [ResponsavelController::class, 'index'])->name('dashboard');
        Route::get('/chamados/fila', [ResponsavelController::class,'fila'])->name('chamados.fila');
        Route::post('/chamados/{id}/aceitar', [ResponsavelController::class, 'aceitar'])->name('chamados.aceitar');
        Route::patch('/chamados/{id}/status', [ResponsavelController::class, 'updateStatus'])->name('chamados.updateStatus');
});

        // Rotas do admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('/usuarios', AdminUserController::class);
        Route::resource('/chamados', AdminChamadoController::class);
});

        // Autenticação - Breeze
        
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
