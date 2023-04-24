<?php

use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiBlogController;
use App\Http\Controllers\ApiEventController;
use App\Http\Controllers\ApiTestimonialController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Testimonial;
use App\Http\Resources\TestimonialResource;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function(){

        Route::get('/blog', [ApiBlogController::class, 'index']);

        Route::get('/blog/{id}', [ApiBlogController::class, 'show']);

        Route::get('/category', [ApiCategoryController::class, 'index']);

        Route::get('/category/{id}', [ApiCategoryController::class, 'show']);

        Route::get('/testimonial', [ApiTestimonialController::class, 'index']);

        Route::get('/events', [ApiEventController::class,'index']);

        Route::get('/events/{event}', [ApiEventController::class, 'show']);

});



