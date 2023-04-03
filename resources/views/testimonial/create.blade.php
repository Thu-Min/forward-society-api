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

    <form action="{{ route('testimonial.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-5">
            <div class="form-control col-span-1">
                <label class="label">
                    <span class="label-text font-bold text-xl">Description</span>
                </label>
                <textarea
                    name="description"
                    class="textarea textarea-bordered w-full col-span-3 textarea-lg @error('description') is-invalid @enderror"
                    cols="30"
                    rows="15"
                    style="resize: none;"
                >

                </textarea>

                @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-1">
                <div class="form-control col-span-1 mb-10">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Name</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Enter Name"
                        class="input input-bordered w-96 @error('name') is-invalid @enderror"
                        name="name"
                    />
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control col-span-1 mb-10">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Position</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Enter Position"
                        class="input input-bordered w-96 @error('position') is-invalid @enderror"
                        name="position"
                    />
                    @error('position')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-control col-span-1 mb-10">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Photo</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Enter Photo"
                        class="input input-bordered w-96 @error('photo') is-invalid @enderror"
                        name="photo"
                    />
                    @error('photo')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center">
                    <div class="form-control col-span-1 mb-10">
                        <label class="label">
                            <span class="label-text font-bold text-xl">Status</span>
                        </label>
                        <input type="checkbox" class="checkbox border border-black" name="status" value="true"/>
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
