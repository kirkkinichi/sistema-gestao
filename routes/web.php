<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\UsuarioController;

// Configuração de rota para a página inicial
Route::view('/', 'home')->middleware('auth');

// Configuração de rota para a página de login
Route::get('/login', [SessaoController::class, 'create'])->name('login');
Route::post('/login', [SessaoController::class, 'store']);

// Configuração de rota para a página de registro
Route::get('/registrar', [UsuarioController::class, 'create']);
Route::post('/registrar', [UsuarioController::class, 'store']);

// Configuração de rota para a página de logout
Route::post('/logout', [SessaoController::class, 'destroy']);

// Configuração de rotas para o Relatório
Route::get('/relatorio', [RelatorioController::class, 'index'])
->name('relatorio')
->middleware('auth');

// Configuração de rotas para exportação de Relatório em arquivo Excel
Route::get('/relatorio/export', [RelatorioController::class, 'export'])
->name('relatorio.export')
->middleware('auth');

// Configuração de rotas para o CRUD do Grupo Econômico
Route::get('/grupo-economico', [GrupoEconomicoController::class, 'index'])->middleware('auth');
Route::get('/grupo-economico/create', [GrupoEconomicoController::class, 'create'])->middleware('auth');;
Route::post('/grupo-economico', [GrupoEconomicoController::class, 'store'])->middleware('auth');;
Route::get('/grupo-economico/{grupo}', [GrupoEconomicoController::class, 'show'])->middleware('auth');;
Route::get('/grupo-economico/{grupo}/edit', [GrupoEconomicoController::class, 'edit'])->middleware('auth');;
Route::delete('/grupo-economico/{grupo}', [GrupoEconomicoController::class, 'destroy'])->middleware('auth');;
Route::patch('/grupo-economico/{grupo}', [GrupoEconomicoController::class, 'update'])->middleware('auth');;

// Configuração de rotas para o CRUD da Bandeira
Route::get('/bandeira', [BandeiraController::class, 'index'])->middleware('auth');
Route::get('/bandeira/create', [BandeiraController::class, 'create'])->middleware('auth');
Route::post('/bandeira', [BandeiraController::class, 'store'])->middleware('auth');
Route::get('/bandeira/{bandeira}', [BandeiraController::class, 'show'])->middleware('auth');
Route::get('/bandeira/{bandeira}/edit', [BandeiraController::class, 'edit'])->middleware('auth');
Route::delete('/bandeira/{bandeira}', [BandeiraController::class, 'destroy'])->middleware('auth');
Route::patch('/bandeira/{bandeira}', [BandeiraController::class, 'update'])->middleware('auth');

// Configuração de rotas para o CRUD da Unidade
Route::get('/unidades', [UnidadeController::class, 'index'])->middleware('auth');
Route::get('/unidades/create', [UnidadeController::class, 'create'])->middleware('auth');
Route::post('/unidades', [UnidadeController::class, 'store'])->middleware('auth');
Route::get('/unidades/{unidade}', [UnidadeController::class, 'show'])->middleware('auth');
Route::get('/unidades/{unidade}/edit', [UnidadeController::class, 'edit'])->middleware('auth');
Route::delete('/unidades/{unidade}', [UnidadeController::class, 'destroy'])->middleware('auth');
Route::patch('/unidades/{unidade}', [UnidadeController::class, 'update'])->middleware('auth');

// Configuração de rotas para o CRUD do Colaborador
Route::get('/colaboradores', [ColaboradorController::class, 'index'])->middleware('auth');
Route::get('/colaboradores/create', [ColaboradorController::class, 'create'])->middleware('auth');
Route::post('/colaboradores', [ColaboradorController::class, 'store'])->middleware('auth');
Route::get('/colaboradores/{colaborador}', [ColaboradorController::class, 'show'])->middleware('auth');
Route::get('/colaboradores/{colaborador}/edit', [ColaboradorController::class, 'edit'])->middleware('auth');
Route::delete('/colaboradores/{colaborador}', [ColaboradorController::class, 'destroy'])->middleware('auth');
Route::patch('/colaboradores/{colaborador}', [ColaboradorController::class, 'update'])->middleware('auth');


// Route::resource('/api/grupo-economico', GrupoEconomicoController::class);

// Route::resource('/api/bandeira', BandeiraController::class);

// Route::resource('/api/unidade', UnidadeController::class);
