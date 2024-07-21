<?php

use App\Http\Controllers\Convocatoria\ValidarPonenciaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::get('/validar-ponencia/{uuid}', [ValidarPonenciaController::class, 'index'])->name('convocatoria.validar_ponencia');
Route::get('/agradecimiento', function () {
    return view('convocatoria.agradecimiento');
})->name('convocatoria.agradecimiento');