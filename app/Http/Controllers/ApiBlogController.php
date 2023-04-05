<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;

class ApiBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return BlogResource::collection(Blog::paginate(10));
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Blog::findOrFail($id);
    }

}
