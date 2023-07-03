<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogDetailResource;

class ApiBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::when(request('keyword'),fn($q)=>$q->search())
            ->latest("id")
            ->paginate(10)->withQueryString();

        return BlogResource::collection($blogs);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return new BlogDetailResource($blog);
    }

}
