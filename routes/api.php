<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CategoryResource;
use App\Http\Controllers\ApiBlogController;
use App\Http\Resources\TestimonialResource;
use App\Http\Controllers\ApiEventController;
use App\Http\Controllers\ApiContactController;
use App\Http\Controllers\ApiCategoryController;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\ApiTestimonialController;




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

        Route::get('/events/finished', [ApiEventController::class,'finished']);

        Route::get('/events/upcoming', [ApiEventController::class,'upcoming']);

        Route::get('/events/ongoing', [ApiEventController::class,'ongoing']);

        Route::get('/events/{event}', [ApiEventController::class, 'show']);

        Route::post('/contact', [ApiContactController::class, 'store']);

});



