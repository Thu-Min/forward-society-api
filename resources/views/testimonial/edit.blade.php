@extends('templates.master')

@section('title')
Testimonial
@endsection

@section('content')
<div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
    <ul>
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li><a href="{{ route('testimonial.index') }}">Testimonial</a></li>
      <li>Create Testimonial</li>
    </ul>
</div>

<x-card>
    <x-card-header title="Create New Testimonial">

    </x-card-header>

    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST">
        @csrf
        @method("put")
        <div class="grid grid-cols-2 gap-5">
            <div class="form-control col-span-1">
                <label class="label">
                    <span class="label-text font-bold text-xl">Description</span>
                </label>
                <textarea
                    name="description"
                    class="textarea textarea-bordered w-full col-span-3 textarea-lg"
                    cols="30"
                    rows="16"
                    required
                >
                {{ $testimonial->description }}
                </textarea>
            </div>

            <div class="col-span-1">
                <div class="form-control col-span-1 mb-10">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Name</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Type here"
                        class="input input-bordered w-96"
                        name="name"
                        required
                        value="{{ $testimonial->name }}"
                    />
                </div>

                <div class="form-control col-span-1 mb-10">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Position</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Type here"
                        class="input input-bordered w-96"
                        name="position"
                        required
                        value="{{ $testimonial->position }}"
                    />
                </div>

                <div class="form-control col-span-1">
                    <label class="">
                        <span class="label-text font-bold text-xl">Old Photo</span>
                    </label>

                    <img src="{{ $testimonial->photo }}" class="w-40 rounded" alt="">
                </div>

                <div class="form-control col-span-1 mb-10">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Upload New Photo</span>
                    </label>

                    <input
                        type="text"
                        placeholder="Type here"
                        class="input input-bordered w-96"
                        name="photo"
                        required
                    />
                </div>

                <div class="flex items-center">
                    <div class="form-control col-span-1 mb-10">
                        <label class="label">
                            <span class="label-text font-bold text-xl">Status</span>
                        </label>
                        @if ($testimonial->status == true)
                            <input type="checkbox" class="checkbox border border-black" checked/>
                        @else
                            <input type="checkbox" class="checkbox border border-black"/>
                        @endif

                    </div>

                    <div class="ml-56">
                        <button class="btn btn-primary text-white">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-card>

@endsection
