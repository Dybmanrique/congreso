<?php

use App\Http\Controllers\Admin\ParticipantesController;
use App\Http\Controllers\Admin\PonentesController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //PARTICIPANTES
    Route::get('participantes', [ParticipantesController::class, 'index'])->name('admin.participantes.index');
    Route::get('participantes/data', [ParticipantesController::class, 'data'])->name('admin.participantes.data');
    Route::post('participantes/validar', [ParticipantesController::class, 'validar'])->name('admin.participantes.validar');
    Route::post('participantes/invalidar', [ParticipantesController::class, 'invalidar'])->name('admin.participantes.invalidar');
    Route::get('participantes/crear', [ParticipantesController::class, 'create'])->name('admin.participantes.create');

    //PONENTES
    Route::get('ponentes', [PonentesController::class, 'index'])->name('admin.ponentes.index');
    Route::get('ponentes/data', [PonentesController::class, 'data'])->name('admin.ponentes.data');
    Route::post('ponentes/validar', [PonentesController::class, 'validar'])->name('admin.ponentes.validar');
    Route::post('ponentes/invalidar', [PonentesController::class, 'invalidar'])->name('admin.ponentes.invalidar');
    Route::post('ponentes/habilitar', [PonentesController::class, 'habilitar'])->name('admin.ponentes.habilitar');
    Route::post('ponentes/inhabilitar', [PonentesController::class, 'inhabilitar'])->name('admin.ponentes.inhabilitar');
    Route::get('ponentes/crear', [PonentesController::class, 'create'])->name('admin.ponentes.create');

    //USUARIOS
    Route::get('usuarios', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('usuarios/data', [UserController::class, 'data'])->name('admin.users.data');
    Route::get('usuarios/crear', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('usuarios/editar/{user}', [UserController::class, 'edit'])->name('admin.users.edit');

    Route::get('/email', function () {
        return view('emails.validar-ponencia', ['enlace' => 'xdxddxxd.com']);
    })->name('email');
});
