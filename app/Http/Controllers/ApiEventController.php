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
            ->paginate(10)
            ->withQueryString();
        return EventResource::collection($events);
    }

    public function show(Event $event)
    {
        return new EventShowResource($event);
    }
}
