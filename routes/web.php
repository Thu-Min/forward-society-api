<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;


Route::view('/', 'auth.login');

Route::middleware(['auth'])->prefix('/dashboard')->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::view('/table', 'table')->name('table');
    Route::view('/user', 'form')->name('form');

    Route::resource('/photo', PhotoController::class);

    Route::resource('/blog', \App\Http\Controllers\BlogController::class);
    Route::resource('/category', \App\Http\Controllers\CategoryController::class);


    Route::resource('/testimonial', TestimonialController::class);

    Route::resource('/events', EventController::class);
    Route::resource('/event_categories', EventCategoryController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
