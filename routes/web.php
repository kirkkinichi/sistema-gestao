<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\UnidadeController;

Route::get('/', function () {
    return view('home');
});

// Configuração de rotas para o CRUD do Grupo Econômico
Route::get('/grupo-economico', [GrupoEconomicoController::class, 'index']);
Route::get('/grupo-economico/create', [GrupoEconomicoController::class, 'create']);
Route::post('/grupo-economico', [GrupoEconomicoController::class, 'store']);
Route::get('/grupo-economico/{grupo}', [GrupoEconomicoController::class, 'show']);
Route::get('/grupo-economico/{grupo}/edit', [GrupoEconomicoController::class, 'edit']);
Route::delete('/grupo-economico/{grupo}', [GrupoEconomicoController::class, 'destroy']);
Route::patch('/grupo-economico/{grupo}', [GrupoEconomicoController::class, 'update']);

// Configuração de rotas para o CRUD da Bandeira
Route::get('/bandeira', [BandeiraController::class, 'index']);
Route::get('/bandeira/create', [BandeiraController::class, 'create']);
Route::post('/bandeira', [BandeiraController::class, 'store']);
Route::get('/bandeira/{bandeira}', [BandeiraController::class, 'show']);
Route::get('/bandeira/{bandeira}/edit', [BandeiraController::class, 'edit']);
Route::delete('/bandeira/{bandeira}', [BandeiraController::class, 'destroy']);
Route::patch('/bandeira/{bandeira}', [BandeiraController::class, 'update']);

// Route::resource('/api/grupo-economico', GrupoEconomicoController::class);

// Route::resource('/api/bandeira', BandeiraController::class);

// Route::resource('/api/unidade', UnidadeController::class);
