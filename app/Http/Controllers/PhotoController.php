<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use App\Http\Resources\PhotoResource;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePhotoRequest;
use Illuminate\Contracts\Foundation\Application;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::latest("id")->paginate(12);
        return PhotoResource::collection($photos);
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $photos = Photo::latest("id")->paginate(12)->through(function($photo){
            $photo->thumbnail = asset('storage/thumbnail_'.$photo->name);
            $photo->md = asset('storage/md_'.$photo->name);
            $photo->lg = asset('storage/lg_'.$photo->name);

            return $photo;
        });

        return view('photo',compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  StorePhotoRequest  $request
     * @return RedirectResponse
     */
    public function store(\Illuminate\Http\Request $request)
    {
        // dd($request->all());

        $newName = uniqid()."_"."photo.".$request->name->extension();

        $thumbnail = Image::make($request->name)->fit(300,300);
        $thumbnail->save(public_path("storage/thumbnail_".$newName));

        $md = Image::make($request->name)->resize(900, null, fn($constraint)=>$constraint->aspectRatio());
        $md->save(public_path("storage/md_".$newName));

        $lg = Image::make($request->name)->resize(1500, null,fn($constraint)=>$constraint->aspectRatio());
        $lg->save(public_path("storage/lg_".$newName));

        $photo = new Photo();
        $photo->name = $newName;
        $photo->save();

        return redirect()->route('photo.create')->with('status','Photo Upload Successfully');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Photo  $photo
     * @return Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Photo
     * @return Response
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Photo
     * @return Response
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Photo $photo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Photo $photo)
    {
        Storage::delete('public/thumbnail_'.$photo->name);
        Storage::delete('public/md_'.$photo->name);
        Storage::delete('public/lg_'.$photo->name);
        $photo->delete();

        return redirect()->route('photo.create')->with('status', 'Photo delete Successfully');
    }
}
