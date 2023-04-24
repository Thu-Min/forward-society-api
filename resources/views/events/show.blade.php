@extends('templates.master')

@section('title')
Event Detail
@endsection

@section('content')
{{-- breadcrumb --}}
<div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
    <ul>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{route('events.index')}}">Events</a></li>
        <li>Event Details</li>
    </ul>
</div>

<x-card>
    <x-card-header title="Event Detail">
        <div class="btn-group">
            <a class="btn btn-primary btn-outline btn-sm" href="{{ route('events.edit', $event->id) }}">
                <i class="fa-solid fa-edit"></i>
            </a>
            <button form="delForm{{ $event->id }}" onclick="return confirm('Are you sure you want to delete this blog?')" class="btn btn-primary btn-outline btn-sm" style="border-top-right-radius: 0.5rem; border-bottom-right-radius: 0.5rem;">
                <i class="fa-solid fa-trash"></i>
            </button>
            <form id="delForm{{ $event->id }}" action="{{ route('events.destroy', $event->id) }}" method="post">
                @csrf
                @method('delete')
            </form>
        </div>
    </x-card-header>

    <div class="card">
        <div class="card-body">
            <img src={{ url($event->thumbnail) }} class="w-100 rounded" alt="Image" />
        </div>
    </div>
    <div class="flex flex-warp gap-x-8 justify-evenly">
        <div class="w-2/3">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Title : {{ $event->title }}</h2>
                    <p class="text-sm"> <b> Instructor : </b> {{ $event->instructor }} </p>
                    <p class="text-sm"> <b> Category : </b> {{ $event->event_category->title }} </p>
                    <p class="text-sm"> <b> Status : </b> {{ $event->status }} </p>
                    <p class="date mb-0">
                        <i class="fa-regular fa-calendar-check"></i>
                        {{ $event->start_date->format('d M Y')}}
                    </p>
                    <p class="time mb-0">
                        <i class="fa-regular fa-calendar-xmark"></i>
                        {{ $event->end_date->format('d M Y')}}
                    </p>
                    <p><i class="fa-solid fa-clock"></i> {{ $event->start_time->format('h:i a')}} - {{ $event->end_time->format('h:i a')}}</p>
                    
                    <hr>
                    <h3 class="card-title">Description</h3>
                    <p>{{ $event->description }}</p>
                </div>
            </div>
        </div>
        <div class="w-1/3">

        </div>
    </div>
</x-card>
@endsection