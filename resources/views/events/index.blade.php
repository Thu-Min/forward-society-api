@extends('templates.master')

@section('title')
    Events
@endsection

@section('content')
    {{-- breadcrumb --}}
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>Event</li>
        </ul>
    </div>
    <x-card>
        <x-card-header title="Event List">
            <a class="btn btn-primary btn-md flex-none mr-3" href="{{ route('events.create') }}">
                <i class="fa-regular fa-square-plus mr-2"></i>
                Create New Event
            </a>
        </x-card-header>

        @if (count($events) > 0)
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $event)
                            <tr>
                                <td class="font-bold"> {{ $event->id }} </td>
                                <td>
                                    <p> {{ $event->title }} </p>
                                    <span class="badge badge-warning">
                                        <i class="fa-regular fa-rectangle-list mr-2"></i>{{ $event->event_category->title }}
                                    </span>
                                    <span class="badge badge-info">
                                        <i class="fa-solid fa-pen mr-2"></i> {{ $event->instructor}}
                                    </span>
                                </td>
                                <td>
                                    <p>{{strtoupper($event->status)}}</p>
                                </td>
                                <td>
                                    <p class="date mb-0">
                                    <i class="fa-regular fa-calendar-check"></i>
                                        {{ $event->start_date->format('d M Y')}}
                                    </p>
                                    <p class="time mb-0">
                                        <i class="fa-regular fa-calendar-xmark"></i>
                                        {{ $event->end_date->format('d M Y')}}
                                    </p>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        {{-- detail --}}
                                        <a class="btn btn-primary btn-outline btn-sm"
                                            href="{{ route('events.show', $event->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        {{-- edit --}}
                                        <a class="btn btn-primary btn-outline btn-sm"
                                            href="{{ route('events.edit', $event->id) }}">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        {{-- delete --}}
                                        <button class="btn btn-primary btn-outline btn-sm"
                                            style="border-top-right-radius: 0.5rem; border-bottom-right-radius: 0.5rem;"
                                            form="delForm{{ $event->id }}"
                                            onclick="return confirm('Are you sure you want to delete this blog?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <form id="delForm{{ $event->id }}"
                                            action="{{ route('events.destroy', $event->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6 fixed bottom-0 mb-10">
                {{ $events->onEachSide(1)->links() }}
            </div>
        @else
            <h3 class="mx-auto mt-10 text-2xl font-semibold text-center text-blue-600"> There is no Blog Data. Add
                some new....</h3>
        @endif
    </x-card>
@endsection