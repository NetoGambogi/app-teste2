<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequerenteController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');  // Botão para deslogar o usuário e retornar a tela de login
})->name('logout');

        // Página inicial

Route::get('/inicio', [HomeController::class, 'index'])->name('inicio');

        // Rotas do requerente: 

Route::middleware(['auth', 'role:requerente'])->prefix('requerente')->name('requerente.')->group(function () {
        Route::get('/dashboard', [RequerenteController::class, 'index'])->name('dashboard'); // Painel do requerente
        Route::get('/chamados/novo', [RequerenteController::class,'create'])->name('chamados.create'); // Exibe formulário para criar chamados
        Route::post('/chamados', [RequerenteController::class, 'store'])->name('chamados.store'); // Salva o novo chamado
        Route::get('/chamados/{chamado}', [RequerenteController::class, 'show'])->name('chamados.show'); // Mostra o chamado detalhadamente
        Route::get('/chamados/{chamado}/edit', [RequerenteController::class, 'edit'])->name('chamados.edit'); // Exibe o formulário para atualizar chamados
        Route::put('/chamados/{chamado}', [RequerenteController::class, 'update'])->name('chamados.update');  // Salva o chamado atualizado
        Route::delete('/chamados/{chamado}', [RequerenteController::class, 'destroy'])->name('chamados.destroy'); // Apaga um chamado
});

        // Rotas do responsável
Route::middleware(['auth', 'role:responsavel,admin'])->prefix('responsavel')->name('responsavel.')->group(function () {
        Route::get('/dashboard', [ResponsavelController::class, 'index'])->name('dashboard'); // Painel do responsavel
        Route::get('/chamados/fila', [ResponsavelController::class,'fila'])->name('chamados.fila'); // Exibe a fila de chamados em aberto
        Route::get('/chamados/{chamado}', [ResponsavelController::class, 'show'])->name('chamados.show'); // Mostra o chamado detalhadamente
        Route::post('/chamados/{chamado}/aceitar', [ResponsavelController::class, 'aceitar'])->name('chamados.aceitar');
        Route::post('/chamados/{chamado}/retornar', [ResponsavelController::class, 'retornar'])->name('chamados.retornar'); // Exibe o botão de aceitar chamado, automaticamente atualiza o status
        Route::get('/chamados/{chamado}/edit', [ResponsavelController::class, 'edit'])->name('chamados.edit'); // Exibe o formulário de edição de status
        Route::patch('/chamados/{chamado}/status', [ResponsavelController::class, 'updateStatus'])->name('chamados.updateStatus'); // Salva o chamado com status atualizado.
});

        // Rotas do admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

        // Painel do admin
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard'); // painel do admin

        // Controle dos usuários
        Route::get('/usuarios', [AdminController::class, 'index'])->name('usuarios.index');
        Route::get('/usuarios/novo', [AdminController::class,'create'])->name('usuarios.create'); // exibe o formulário para criar um novo usuario
        Route::post('/usuarios', [AdminController::class, 'store'])->name('usuarios.store'); // salva as informações do novo usuario
        Route::get('/usuarios/{user}', [AdminController::class, 'show'])->name('usuarios.show'); // mostra os detalhes do usuario
        Route::get('/usuarios/{user}/edit', [AdminController::class, 'edit'])->name('usuarios.edit'); // exibe o formulario de edição do usuario
        Route::put('/usuarios/{user}', [AdminController::class, 'update'])->name('usuarios.update'); // salva as informações do usuário atualizadas
        Route::delete('/usuarios/{user}', [AdminController::class, 'destroy'])->name('usuarios.destroy'); // apaga um usuario

        // Controle dos chamados
        Route::get('/chamados', [AdminController::class, 'chamados'])->name('chamados.index');
        Route::get('/chamados/{chamado}', [AdminController::class, 'showChamado'])->name('chamados.show'); // mostra os detalhes do usuario
        Route::get('/chamados/{chamado}/edit', [AdminController::class, 'editChamado'])->name('chamados.edit'); // exibe o formulario de edição de um chamado
        Route::put('/chamados/{chamado}', [AdminController::class, 'updateChamado'])->name('chamados.update'); // salva as informações atualizadas do chamado
        Route::delete('/chamados/{chamado}', [AdminController::class, 'destroyChamado'])->name('chamados.destroy'); // apaga um chamado

});

        // Autenticação - Breeze
        
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
