<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\UnidadeController;

Route::get('/', function () {
    return view('home');
});

Route::get('/grupo-economico', [GrupoEconomicoController::class, 'index']);
Route::get('/grupo-economico/create', [GrupoEconomicoController::class, 'create']);
Route::post('/grupo-economico', [GrupoEconomicoController::class, 'store']);
Route::get('/grupo-economico/{grupo}', [GrupoEconomicoController::class, 'show']);
Route::get('/grupo-economico/{grupo}/edit', [GrupoEconomicoController::class, 'edit']);
Route::delete('/grupo-economico/{grupo}', [GrupoEconomicoController::class, 'destroy']);
Route::patch('/grupo-economico/{grupo}', [GrupoEconomicoController::class, 'update']);

// Route::get('/bandeira', [BandeiraController::class, 'create'])->name('bandeira');

// Route::get('/unidade', [UnidadeController::class, 'create'])->name('unidade');

// Route::resource('/api/bandeira', BandeiraController::class);

// Route::resource('/api/unidade', UnidadeController::class);
