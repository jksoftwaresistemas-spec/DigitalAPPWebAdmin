<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Exibe o formulário de login (sua página welcome)
Route::get('/', function () {
    return view('welcome');
})->name('login');

// Processa o login - IMPORTANTE: Esta rota recebe o POST do formulário da welcome
Route::post('/', [AuthenticatedSessionController::class, 'store']);

// Dashboard (Unificado em uma única chamada)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rotas Protegidas por Autenticação
Route::middleware('auth')->group(function () {
    
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Autorização
    Route::get('/autorizar', function () {
        return view('autorizar.index');
    })->name('autorizar.index');

    // Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
});

// Importa as demais rotas de autenticação (register, logout, password reset, etc)
require __DIR__.'/auth.php';