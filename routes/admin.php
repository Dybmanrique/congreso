<?php

use App\Http\Controllers\Admin\ParticipantesController;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('participantes', [ParticipantesController::class, 'index'])->name('admin.participantes.index');
    Route::get('participantes/data', [ParticipantesController::class, 'data'])->name('admin.participantes.data');
    Route::post('participantes/validar', [ParticipantesController::class, 'validar'])->name('admin.participantes.validar');
    Route::post('participantes/invalidar', [ParticipantesController::class, 'invalidar'])->name('admin.participantes.invalidar');
});
