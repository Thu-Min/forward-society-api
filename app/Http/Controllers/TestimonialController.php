<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TestimonialResource;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonial = Testimonial::latest('id')->paginate(5);

        return view('testimonial.list', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);

        if($validator->fails()){
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'photo' => $request->photo,
            'status' => $request->has('status'),
        ];

        Testimonial::create($data);

        return redirect()->route('testimonial.index')->with('status', 'Testimonial Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->description = $request->description;
        $testimonial->photo = $request->photo;
        $testimonial->status = $request->has('status');
        $testimonial->update();

        return redirect()->route('testimonial.index')->with('status', 'Testimonial Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('status', 'Testimonial Deleted Successfully');
    }
}
