<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::when(request('keyword'),fn($q)=>$q->search())
        ->latest("id")
        ->paginate(5)->withQueryString();
        return view('blog.index', compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();

        return view('blog.create', [
            'categories' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->excerpt = Str::words($request->description);
        $blog->author_name = $request->author_name;
        $blog->designer_name = $request->designer_name;
        $blog->category_id = $request->category;
        $blog->image = $request->image;
        $blog->save();
        return redirect()->route('blog.index')->with('status','Blog created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('blog.show',[
            "blog" => Blog::findOrFail($id),
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $catgories = Category::all();
        $blog = Blog::findOrFail($id);

        return view('blog.edit',[
            'categories'=> $catgories,
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->excerpt = Str::words($request->description);
        $blog->author_name = $request->author_name;
        $blog->designer_name = $request->designer_name;
        $blog->category_id = $request->category;
        $blog->image = $request->image;
        $blog->update();

        return redirect()->route('blog.index')->with('status','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Blog::findOrFail($id)->delete();
        $message = "Blog is deleted";
        return redirect()->route('blog.index')->with('status',$message);
    }
}
