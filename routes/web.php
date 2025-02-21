<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\ColaboradoresController;
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

// Configuração de rotas para o CRUD da Unidade
Route::get('/unidades', [UnidadeController::class, 'index']);
Route::get('/unidades/create', [UnidadeController::class, 'create']);
Route::post('/unidades', [UnidadeController::class, 'store']);
Route::get('/unidades/{unidade}', [UnidadeController::class, 'show']);
Route::get('/unidades/{unidade}/edit', [UnidadeController::class, 'edit']);
Route::delete('/unidades/{unidade}', [UnidadeController::class, 'destroy']);
Route::patch('/unidades/{unidade}', [UnidadeController::class, 'update']);

// Configuração de rotas para o CRUD do Colaborador
Route::get('/colaboradores', [ColaboradoresController::class, 'index']);
Route::get('/colaboradores/create', [ColaboradoresController::class, 'create']);
Route::post('/colaboradores', [ColaboradoresController::class, 'store']);
Route::get('/colaboradores/{colaborador}', [ColaboradoresController::class, 'show']);
Route::get('/colaboradores/{colaborador}/edit', [ColaboradoresController::class, 'edit']);
Route::delete('/colaboradores/{colaborador}', [ColaboradoresController::class, 'destroy']);
Route::patch('/colaboradores/{colaborador}', [ColaboradoresController::class, 'update']);

// Route::resource('/api/grupo-economico', GrupoEconomicoController::class);

// Route::resource('/api/bandeira', BandeiraController::class);

// Route::resource('/api/unidade', UnidadeController::class);
