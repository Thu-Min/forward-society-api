<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\EventShowResource;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\Client\ResponseSequence;

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
            ->latest('id')
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

        $eventOne = Event::where('id',$event->id)->get()->toArray();
        $otherEvent = Event::where('status' , $eventOne['0']['status'])->where('id', '!=', $eventOne['0']['id'])->take(3)->get();
        return response()->json([
            "event" => new EventResource($event),
            "otherEvent" => EventResource::collection($otherEvent)
        ]);
    }
}

