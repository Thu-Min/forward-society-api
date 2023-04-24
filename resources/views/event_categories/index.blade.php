@extends('templates.master')

@section('title')
    Event Category
@endsection

@section('content')
    {{-- breadcrumb --}}
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li> Event Category</li>
        </ul>
    </div>
    <x-card>
        <x-card-header title="Event Category">

        </x-card-header>
        <div class="ml-5">
            <form action="{{ route('event_categories.store') }}" method="post">
                @csrf
                <label class="label font-bold text-xl" for="categories"> Create New Event Category </label>
                @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <input type="text" placeholder="Create Event Category Title here"
                    class="input input-bordered w-[89%] @error('title') is-invalid @enderror" name="title">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-circle-plus mr-3"></i> Create
                </button>

            </form>
            @include('event_categories.list')
        </div>
    </x-card>
@endsection