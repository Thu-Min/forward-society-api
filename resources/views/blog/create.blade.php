@extends('templates.master')

@section('title')
    Create Blog
@endsection

@section('content')
    {{-- breadcrumb --}}
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('blog.index') }}">Blog</a></li>
            <li>Create Blog</li>
        </ul>
    </div>
    <x-card>
        <x-card-header title="Create New Blog">

        </x-card-header>

        <form action="{{ route('blog.store') }}" method="post">
            @csrf
            <div class="grid grid-cols-2 gap-5">
                <div class="form-control col-span-1">
                    <label class="label">
                        <span class="label-text font-bold text-xl">Description</span>
                    </label>
                    <textarea name="description" class="textarea textarea-bordered textarea-lg w-full max-w-xl"
                        placeholder="Enter Blog Description here" cols="30" rows="15"></textarea>
                    @error('description')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class=class="col-span-1">
                    <div class="form-control col-span-1 mb-2">
                        <label class="label">
                            <span class="label-text font-bold text-xl">Title</span>
                        </label>
                        <input type="text" placeholder="Enter Blog Title here"
                            class="input input-bordered input-md w-full max" name="title">
                        @error('title')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-control col-span-1 mb-2">
                        <label class="label">
                            <span class="label-text font-bold text-xl">Choose Category</span>
                        </label>
                        <select class="select select-bordered select-md w-full max" name="category">
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->title }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @error('category')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-control col-span-1 mb-2">
                        <label class="label">
                            <span class="label-text font-bold text-xl">Written by</span>
                        </label>
                        <input type="text" placeholder="Enter Authour Name here"
                            class="input input-bordered input-md w-full max" name="author_name">
                        @error('author_name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-control col-span-1 mb-2">
                        <label class="label">
                            <span class="label-text font-bold text-xl">Design by</span>
                        </label>
                        <input type="text" placeholder="Enter Designer Name here"
                            class="input input-bordered input-md w-full max" name="designer_name">
                        @error('designer_name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-control col-span-1 mb-2">
                        <label class="label">
                            <span class="label-text font-bold text-xl">Image</span>
                        </label>
                        <input type="text" placeholder="Enter Image Url"
                            class="file-input file-input-primary file-input-bordered w-full max" name="image">
                        @error('image')
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
