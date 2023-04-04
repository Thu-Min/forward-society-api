@extends('templates.master')

@section('title')
    Blog Detail
@endsection

@section('content')
    {{-- breadcrumb --}}
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('blog.index') }}">Blog</a></li>
            <li>Blog Detail</li>
        </ul>
    </div>
    <x-card>
        <x-card-header title="Blog Detail">
            <div class="btn-group">
                <a class="btn btn-primary btn-outline btn-sm" href="{{ route('blog.edit', $blog->id) }}">
                    <i class="fa-solid fa-edit"></i>
                </a>
                <button form="delForm{{ $blog->id }}"
                    onclick="return confirm('Are you sure you want to delete this blog?')"
                    class="btn btn-primary btn-outline btn-sm" style="border-top-right-radius: 0.5rem; border-bottom-right-radius: 0.5rem;">
                    <i class="fa-solid fa-trash"></i>
                </button>
                <form id="delForm{{ $blog->id }}" action="{{ route('blog.destroy', $blog->id) }}" method="post">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </x-card-header>

        <div class="card">
            <div class="card-body">
                <img src={{ url($blog->image) }} class="w-100 rounded" alt="Image"/>
            </div>
        </div>
        <div class="flex flex-warp gap-x-8 justify-evenly">
            <div class="w-2/3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Title : {{ $blog->title }}</h2>
                        <p class="text-sm"> <b> Written by : </b> {{ $blog->author_name }} </p>
                        <p class="text-sm"> <b> Design by : </b> {{ $blog->designer_name }} </p>
                        <hr>
                        <h3 class="card-title">Description</h3>
                        <p>{{ $blog->description }}</p>
                    </div>
                </div>
            </div>
            <div class="w-1/3">

            </div>
        </div>
    </x-card>
@endsection
