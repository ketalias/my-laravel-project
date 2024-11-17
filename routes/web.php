<?php

use App\Http\Controllers\TournamentParticipantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TournamentParticipantController::class, 'index'])->name('participants.index');

    Route::resource('participants', TournamentParticipantController::class)->except(['index']);

    Route::get('/participants/create', [TournamentParticipantController::class, 'create'])->name('participants.create');
    Route::post('/participants', [TournamentParticipantController::class, 'store'])->name('participants.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

