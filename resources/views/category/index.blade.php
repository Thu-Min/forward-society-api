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
                <form action="{{route('category.store')}}" method="post">
                @csrf
                <label class="label font-bold text-xl" for="categories"> Add Category </label>
                    @error('title')
                    <div class="alert alert-warning shadow-lg">
                        <div>
                            <i class="fa-solid fa-triangle-exclamation"></i>
                          <span>{{$message}}</span>
                        </div>
                    </div>
                     @enderror
                    <div class="input-group w-full max-w-3xl mt-3">
                        <input type="text" placeholder="Add Category here" class="input input-bordered input-md w-full max-w-3xl mb-1 @error('title') is-invalid @enderror" name="title">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-circle-plus mr-3"></i> Add
                        </button>
                    </div>
                </form>
                @include('category.list')
            </div>
    </x-card>
@endsection
        
