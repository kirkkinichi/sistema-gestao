<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\RelatorioController;

Route::get('/', function () {
    return view('home');
});

Route::get('/relatorio', [RelatorioController::class, 'index']);

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

// Configuração de rotas para o CRUD da Unidade
Route::get('/unidades', [UnidadeController::class, 'index']);
Route::get('/unidades/create', [UnidadeController::class, 'create']);
Route::post('/unidades', [UnidadeController::class, 'store']);
Route::get('/unidades/{unidade}', [UnidadeController::class, 'show']);
Route::get('/unidades/{unidade}/edit', [UnidadeController::class, 'edit']);
Route::delete('/unidades/{unidade}', [UnidadeController::class, 'destroy']);
Route::patch('/unidades/{unidade}', [UnidadeController::class, 'update']);

// Configuração de rotas para o CRUD do Colaborador
Route::get('/colaboradores', [ColaboradorController::class, 'index']);
Route::get('/colaboradores/create', [ColaboradorController::class, 'create']);
Route::post('/colaboradores', [ColaboradorController::class, 'store']);
Route::get('/colaboradores/{colaborador}', [ColaboradorController::class, 'show']);
Route::get('/colaboradores/{colaborador}/edit', [ColaboradorController::class, 'edit']);
Route::delete('/colaboradores/{colaborador}', [ColaboradorController::class, 'destroy']);
Route::patch('/colaboradores/{colaborador}', [ColaboradorController::class, 'update']);

// Route::resource('/api/grupo-economico', GrupoEconomicoController::class);

// Route::resource('/api/bandeira', BandeiraController::class);

// Route::resource('/api/unidade', UnidadeController::class);
