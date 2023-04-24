@extends('templates.master')

@section('title')
Edit Event
@endsection

@section('content')
{{-- breadcrumb --}}
<div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
    <ul>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('events.index') }}">Event</a></li>
        <li>Edit Event</li>
    </ul>
</div>
<x-card>
    <x-card-header title="Edit Event">

    </x-card-header>

    <form class="max-w lg mx-auto" action="{{ route('events.update', $event->id) }}" method="post">
        @csrf
        @method('put')
        <div class="grid grid-cols-2 gap-5">
            <div class="form-control col-span-1">
                <label class="label">
                    <span class="label-text font-bold text-xl">Description</span>
                </label>
                <textarea name="description" class="textarea textarea-bordered textarea-lg w-full max-w-xl" cols="30" rows="16">{{ old('description', $event->description) }}</textarea>
                @error('description')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class=class="col-span-1">
                <div class="form-control col-span-1">
                    <label class="">
                        <span class="label-text font-bold text-xl">Old Photo</span>
                    </label>

                    <img src="{{ $event->thumbnail }}" class="w-40 rounded" alt="">
                </div>
                <div class="form-control col-span-1 mb-2">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Title</span>
                    </label>
                    <input type="text" class="input input-bordered input-md w-full max" name="title" value="{{ old('title', $event->title) }}">
                    @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control col-span-1 mb-2">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Choose Category</span>
                    </label>
                    <select class="select select-bordered select-md w-full max" name="event_category">
                        @forelse ($event_categories as $event_category)
                        <option value="{{ $event_category->id }}" {{old('event_category', $event->event_category_id) == $event_category->id ? 'selected' : '' }}>
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
                    <label class="label">
                        <span class="label-text font-bold text-xl">Instructed by</span>
                    </label>
                    <input type="text" class="input input-bordered input-md w-full max" name="instructor" value="{{ old('instructor', $event->instructor) }}">
                    @error('instructor')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="upcoming" value="upcoming" {{old('status', $event->status) == 'upcoming' ? 'checked' : ''}}>
                        <label class="form-check-label" for="upcoming">
                            Upcoming
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="ongoing" value="ongoing" {{old('status', $event->status) == 'ongoing' ? 'checked' : ''}}>
                        <label class="form-check-label" for="ongoing">
                            Ongoing
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="finished" value="finished" {{old('status', $event->status) == 'finished' ? 'checked' : ''}}>
                        <label class="form-check-label" for="finished">
                            Finished
                        </label>
                    </div>
                    @error('status')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control col-span-1 mb-2">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Image</span>
                    </label>
                    <input type="text" class="file-input file-input-primary file-input-bordered w-full max" name="thumbnail" value="{{ old('thumbnail', $event->thumbnail) }}">
                    @error('thumbnail')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="label" for="start_date">
                        <span class="label-text font-bold text-xl">Start Date</span>
                    </label>
                    <input type="date" name="start_date" value="{{old('start_date',$event->start_date->format('Y-m-d'))}}" id="start_date">
                    @error('start_date')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="label" for="end_date">
                        <span class="label-text font-bold text-xl">End Date</span>
                    </label>
                    <input type="date" name="end_date" value="{{old('end_date',$event->end_date->format('Y-m-d'))}}" id="end_date">
                    @error('end_date')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="label" for="start_time">
                        <span class="label-text font-bold text-xl">Start Time</span>
                    </label>
                    <input type="time" name="start_time" value="{{old('start_time',$event->start_time->format('H:i'))}}" id="start_time">
                    @error('start_time')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="label" for="end_time">
                        <span class="label-text font-bold text-xl">End Time</span>
                    </label>
                    <input type="time" name="end_time" value="{{old('end_time',$event->end_time->format('H:i'))}}" id="end_time">
                    @error('end_time')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-2">
                    <i class="fa-solid fa-arrow-up-from-bracket mr-3"></i> Update
                </button>
            </div>
        </div>
    </form>

</x-card>
@endsection