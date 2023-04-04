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

        <div class="flex flex-warp gap-x-8 justify-evenly">

            <div class="md:w-2/3 lg:w-1/2">
                <form class="max-w lg mx-auto" action="{{ route('blog.store') }}" method="post">
                    @csrf
                    <div class="form-control w-full">
                        <label class="label font-bold text-xl" for="Description">Description</label>
                        <textarea name="description" class="textarea textarea-bordered textarea-lg w-full max-w-xl"
                            placeholder="Enter Blog Description here" cols="30" rows="15"></textarea>
                    </div>
                    @error('description')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
            </div>
            <div>
                <div class="form-control w-full">
                    <label class="label font-bold text-xl" for="title">Title</label>
                    <input type="text" placeholder="Enter Blog Title here"
                        class="input input-bordered input-md w-full max" name="title">
                    @error('title')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control w-full">
                    <label class="label font-bold text-xl" for="category">Choose Category</label>
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
                <div class="form-control w-full">
                    <label class="label font-bold text-xl" for="author_name">Written by</label>
                    <input type="text" placeholder="Enter Authour Name here"
                        class="input input-bordered input-md w-full max" name="author_name">
                    @error('author_name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control w-full">
                    <label class="label font-bold text-xl" for="designer_name">Design by</label>
                    <input type="text" placeholder="Enter Designer Name here"
                        class="input input-bordered input-md w-full max" name="designer_name">
                    @error('designer_name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control w-full">
                    <label class="label font-bold text-xl" for="image">Image</label>
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
            </form>
        </div>

    </x-card>
@endsection
