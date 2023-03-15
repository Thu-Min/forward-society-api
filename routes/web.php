<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login');

Route::middleware(['auth'])->prefix('/dashboard')->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::view('/table', 'table')->name('table');
    Route::view('/user', 'form')->name('form');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
