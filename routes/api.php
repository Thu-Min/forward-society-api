<?php

use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiBlogController;
use App\Models\Blog;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

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
