@extends('templates.master')

@section('title')
    Edit Blog
@endsection

@section('content')
    {{-- breadcrumb --}}
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('blog.index') }}">Blog</a></li>
            <li>Edit Blog</li>
        </ul>
    </div>
    <x-card>
        <x-card-header title="Edit Blog">

        </x-card-header>

        <div class="flex flex-wrap gap-x-8 justify-evenly">

            <div class="md:w-2/3 lg:w-1/2">
                <form class="max-w lg mx-auto" action="{{ route('blog.update', $blog->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-control w-full">
                        <label class="label font-bold text-xl" for="Description">Description</label>
                        <textarea name="description" class="textarea textarea-bordered textarea-lg w-full max-w-xl" cols="30"
                            rows="16">{{ old('description', $blog->description) }}</textarea>
                        @error('description')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div>
                <div class="form-control w-full">
                    <label class="label font-bold text-xl" for="title">Title</label>
                    <input type="text" class="input input-bordered input-md w-full max" name="title"
                        value="{{ old('title', $blog->title) }}">
                    @error('title')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control w-full">
                    <label class="label font-bold text-xl" for="category">Choose Category</label>
                    <select class="select select-bordered select-md w-full max" @error('category') is-invalid @enderror"
                        name="category">
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id === $blog->category_id ? 'selected' : '' }}>
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
                    <input type="text" class="input input-bordered input-md w-full max" name="author_name"
                        value="{{ old('author_name', $blog->author_name) }}">
                    @error('author_name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control w-full">
                    <label class="label font-bold text-xl" for="designer_name">Design by</label>
                    <input type="text" class="input input-bordered input-md w-full max" name="designer_name"
                        value="{{ old('designer_name', $blog->designer_name) }}">
                    @error('designer_name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control col-span-1">
                    <label class="">
                        <span class="label-text font-bold text-xl">Old Photo</span>
                    </label>

                    <img src="{{ $blog->image }}" class="w-40 rounded" alt="">
                </div>
                <div class="form-control w-full">
                    <label class="label font-bold text-xl" for="Image">Image</label>
                    <input type="text" class="file-input file-input-primary file-input-bordered w-full max"
                        name="image" value="{{ old('image', $blog->image) }}">
                    @error('image')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mt-2">
                        <i class="fa-solid fa-arrow-up-from-bracket mr-3"></i> Update
                    </button>
                </div>
                </form>
            </div>
        </div>

    </x-card>
@endsection
