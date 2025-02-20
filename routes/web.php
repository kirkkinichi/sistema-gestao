<?php

use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\BandeiraController;

Route::get('/', function () {
    return view('home');
});

Route::get('/grupo-economico', function () {
    return view('grupo-economico');
})->name('grupo-economico');

Route::get('/bandeira', [BandeiraController::class, 'create'])->name('bandeira');

Route::get('/unidade', [UnidadeController::class, 'create'])->name('unidade');

Route::resource('/api/grupo-economico', GrupoEconomicoController::class);

Route::resource('/api/bandeira', BandeiraController::class);

Route::resource('/api/unidade', UnidadeController::class);
