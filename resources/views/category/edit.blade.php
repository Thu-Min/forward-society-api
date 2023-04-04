@extends('templates.master')

@section('title')
    Category
@endsection

@section('content')
    {{-- breadcrumb --}}
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('category.index') }}">Category</a></li>
            <li> Edit Category</li>
        </ul>
    </div>
    <x-card>
        <x-card-header title="Category">

        </x-card-header>
        <div class="ml-5">
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('put')
                <label class="label font-bold text-xl" for="categories"> Edit Category </label>

                <input type="text" class="input input-bordered w-[89%]" name="title"
                    value="{{ old('title', $category->title) }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-up-from-bracket mr-3"></i> Update
                </button>

                @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </form>
            @include('category.list')
        </div>
    </x-card>
@endsection
