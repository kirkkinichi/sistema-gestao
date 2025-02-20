<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GrupoEconomicoController;

Route::get('/', function () {
    return view('home');
});

Route::get('/grupo-economico', function () {
    return view('grupo-economico');
})->name('grupo-economico');

Route::get('/api/grupo-economico', [GrupoEconomicoController::class, 'index']);
Route::post('/api/grupo-economico', [GrupoEconomicoController::class, 'store']);
Route::get('/api/grupo-economico/{id}', [GrupoEconomicoController::class, 'show']);
Route::put('/api/grupo-economico/{id}', [GrupoEconomicoController::class, 'update']);
Route::delete('/api/grupo-economico/{id}', [GrupoEconomicoController::class, 'destroy']);
