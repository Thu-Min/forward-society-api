<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;
use App\Models\EventCategory;
use Illuminate\Support\Str;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('event_categories.index', [
            'event_categories' => EventCategory::latest('id')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect(route('event_categories.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventCategoryRequest $request)
    {
        $event_category = new EventCategory();
        $event_category->title = $request->title;
        $event_category->slug = Str::slug($request->title,'-');

        $event_category->save();
        return redirect()->route('event_categories.index')->with('status', 'A new event category is created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(EventCategory $eventCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventCategory $eventCategory)
    {
        return view('event_categories.edit', [
            'event_category' => $eventCategory,
            'event_categories' => EventCategory::latest('id')->paginate(10)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventCategoryRequest $request, EventCategory $eventCategory)
    {
        $eventCategory->title = $request->title;
        $eventCategory->slug = Str::slug($request->title,'-');

        $eventCategory->update();
        return redirect()->route('event_categories.index')->with('status', 'The event category is successfully updated!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventCategory $eventCategory)
    {
        $eventCategory->delete();
        return redirect()->route('event_categories.index')->with('status', 'The event category is successfully deleted!');

    }
}
