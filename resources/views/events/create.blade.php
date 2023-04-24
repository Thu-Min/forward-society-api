@extends('templates.master')

@section('title')
Create Event
@endsection

@section('content')
{{-- breadcrumb --}}
<div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
    <ul>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('blog.index') }}">Event</a></li>
        <li>Create Event</li>
    </ul>
</div>
<x-card>
    <x-card-header title="Create New Event">

    </x-card-header>

    <form action="{{ route('events.store') }}" method="post">
        @csrf
        <div class="grid grid-cols-2 gap-5">
            <div class="form-control col-span-1">
                <label class="label">
                    <span class="label-text font-bold text-xl">Description</span>
                </label>
                <textarea name="description" class="textarea textarea-bordered textarea-lg w-full max-w-xl" placeholder="Enter Event Description here" cols="30" rows="15">{{old('description')}}</textarea>
                @error('description')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class=class="col-span-1">
                <div class="form-control col-span-1 mb-2">
                    <label class="label" for="title">
                        <span class="label-text font-bold text-xl">Title</span>
                    </label>
                    <input type="text" placeholder="Enter Blog Title here" class="input input-bordered input-md w-full max" name="title" id="title" value="{{old('title')}}">
                    @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control col-span-1 mb-2">
                    <label class="label" for="event_category">
                        <span class="label-text font-bold text-xl">Choose Category</span>
                    </label>
                    <select name="event_category" id="event_category" class="select select-bordered select-md w-full max">
                        @forelse ($event_categories as $event_category)
                        <option value="{{ $event_category->id }}"
                            {{old('event_category') == $event_category->id ? 'selected' : ''}}>
                            {{ $event_category->title }}
                        </option>
                        @empty
                        @endforelse
                    </select>
                    @error('event_category')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control col-span-1 mb-2">
                    <label class="label" for="instructor">
                        <span class="label-text font-bold text-xl">Instructor</span>
                    </label>
                    <input type="text" value="{{old('instructor')}}" placeholder="Enter Instrutor Name here" class="input input-bordered input-md w-full max" name="instructor" id="instructor">
                    @error('instructor')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="upcoming" value="upcoming" {{old('status') == 'upcoming' ? 'checked' : ''}}>
                        <label class="form-check-label" for="upcoming">
                            Upcoming
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="ongoing" value="ongoing" {{old('status') == 'ongoing' ? 'checked' : ''}}>
                        <label class="form-check-label" for="ongoing">
                            Ongoing
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="finished" value="finished" {{old('status') == 'finished' ? 'checked' : ''}}>
                        <label class="form-check-label" for="finished">
                            Finished
                        </label>
                    </div>
                    @error('status')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control col-span-1 mb-2">
                    <label class="label" for="thumbnail">
                        <span class="label-text font-bold text-xl">Image</span>
                    </label>
                    <input type="text" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}" placeholder="Enter Image Url" class="file-input file-input-primary file-input-bordered w-full max">
                    @error('thumbnail')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="label" for="start_date">
                        <span class="label-text font-bold text-xl">Start Date</span>
                    </label>
                    <input type="date" name="start_date" value="{{old('start_date')}}" id="start_date">
                    @error('start_date')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="label" for="end_date">
                        <span class="label-text font-bold text-xl">End Date</span>
                    </label>
                    <input type="date" name="end_date" value="{{old('end_date')}}" id="end_date">
                    @error('end_date')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="label" for="start_time">
                        <span class="label-text font-bold text-xl">Start Time</span>
                    </label>
                    <input type="time" name="start_time" value="{{old('start_time')}}" id="start_time">
                    @error('start_time')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="label" for="end_time">
                        <span class="label-text font-bold text-xl">End Time</span>
                    </label>
                    <input type="time" name="end_time" value="{{old('end_time')}}" id="end_time">
                    @error('end_time')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">
                    <i class="fa-solid fa-circle-plus mr-3"></i> Create
                </button>
            </div>
        </div>
    </form>

</x-card>
@endsection