<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $events = Event::latest('id')
                ->paginate(5)
                ->withQueryString();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $event_categories = EventCategory::latest('id')->get();
        return view('events.create', compact('event_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = new Event();
        $event->title = $request->input('title');
        $event->slug = Str::slug($request->input('title'));
        $event->description = $request->input('description');
        $event->excerpt = Str::words($request->input('description'),30);
        $event->instructor = $request->input('instructor');
        $event->thumbnail = $request->input('thumbnail');
        $event->event_category_id = $request->input('event_category');
        $event->status = $request->input('status');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->save();

        return redirect(route('events.index'))->with('status', 'Event is created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show',[
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', [
            'event' => $event,
            'event_categories' => EventCategory::latest('id')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->title = $request->title;
        $event->slug = Str::slug($request->title);
        $event->description = $request->description;
        $event->excerpt = Str::words($request->description);
        $event->instructor = $request->instructor;
        $event->thumbnail = $request->thumbnail;
        $event->event_category_id = $request->event_category;
        $event->status = $request->status;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->update();

        return redirect()->route('events.index')->with('status', 'The event is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {   
        $event->delete();
        return redirect()->route('events.index')->with('status', 'The event is successfully deleted!');

    }
}
