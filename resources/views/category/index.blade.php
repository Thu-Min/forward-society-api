@extends('templates.master')

@section('title')
    Category
@endsection

@section('content')
    {{-- breadcrumb --}}
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li> Category</li>
        </ul>
    </div>
    <x-card>
        <x-card-header title="Category">

        </x-card-header>
        <div class="ml-5">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <label class="label font-bold text-xl" for="categories"> Create New Category </label>
                @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <input type="text" placeholder="Create Category here"
                    class="input input-bordered w-[89%] @error('title') is-invalid @enderror" name="title">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-circle-plus mr-3"></i> Create
                </button>

            </form>
            @include('category.list')
        </div>
    </x-card>
@endsection
