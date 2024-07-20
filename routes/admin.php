<?php

use App\Http\Controllers\Admin\ParticipantesController;
use Illuminate\Support\Facades\Route;

Route::get('/participantes', [ParticipantesController::class, 'index'])->name('admin.participantes.index');
Route::get('/participantes/data', [ParticipantesController::class, 'data'])->name('admin.participantes.data');