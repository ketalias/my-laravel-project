<?php

use App\Http\Controllers\TournamentParticipantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TournamentParticipantController::class, 'index'])->name('participants.index');
Route::get('/participants/create', [TournamentParticipantController::class, 'create'])->name('participants.create');
Route::post('/participants', [TournamentParticipantController::class, 'store'])->name('participants.store');
Route::get('/participants/{id}/edit', [TournamentParticipantController::class, 'edit'])->name('participants.edit');
Route::put('/participants/{id}', [TournamentParticipantController::class, 'update'])->name('participants.update');
Route::put('/participants/{participant}', [TournamentParticipantController::class, 'update'])->name('participants.update');
Route::delete('/participants/{participant}', [TournamentParticipantController::class, 'destroy'])->name('participants.destroy');
