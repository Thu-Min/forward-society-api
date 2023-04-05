<?php

use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiBlogController;
use App\Http\Controllers\ApiTestimonialController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Testimonial;
use App\Http\Resources\TestimonialResource;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function(){

        Route::get('/blog', function() {
            return BlogResource::collection(Blog::all());
        });

        Route::get('/blog/{id}', function (string $id) {
            return new BlogResource(Blog::findOrFail($id));
        });

        Route::get('/category', function() {
            return CategoryResource::collection(Category::all());
        });

        Route::get('/category/{id}', function (string $id) {
            return new CategoryResource(Category::findOrFail($id));
        });

        Route::get('/testimonial', function() {
            return TestimonialResource::collection(Testimonial::all());
        });

});



