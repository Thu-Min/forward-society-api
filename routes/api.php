<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTestimonialController;

// Route::middleware(['auth'])->prefix('/dashboard')->group(function () {
// });


Route::resource('/testimonial', ApiTestimonialController::class);
