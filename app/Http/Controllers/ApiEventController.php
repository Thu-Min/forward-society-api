<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\EventShowResource;
use Illuminate\Http\Request;
use App\Models\Event;

class ApiEventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::search()
            ->latest('id')
            ->paginate(5)
            ->withQueryString();
        return EventResource::collection($events);
    }
    public function finished(Request $request)
    {
        $events = Event::where('status', 'finished')
            ->paginate(6);
        return EventResource::collection($events);
    }
    public function upcoming(Request $request)
    {
        $events = Event::where('status', 'upcoming')
            ->paginate(6);
        return EventResource::collection($events);
    }
    public function ongoing(Request $request)
    {
        $events = Event::where('status', 'ongoing')
            ->paginate(6);
        return EventResource::collection($events);
    }
    public function show(Event $event)
    {
        return new EventShowResource($event);
    }
}
