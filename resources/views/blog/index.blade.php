@extends('templates.master')

@section('title')
    Blog
@endsection

@section('content')
    {{-- breadcrumb --}}
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>Blog</li>
        </ul>
    </div>
    <x-card>
        <x-card-header title="Blog List">
            <a class="btn btn-primary btn-md flex-none mr-3" href="{{ route('blog.create') }}">
                <i class="fa-regular fa-square-plus mr-2"></i>
                Add Blog
            </a>
        </x-card-header>

        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Manage</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr>
                            <td class="font-bold"> {{ $blog->id }} </td>
                            <td>
                                <p> {{ $blog->slug }} </p>
                                <span class="badge badge-warning">
                                    <i class="fa-regular fa-rectangle-list mr-2"></i>{{ $blog->category->title }}
                                </span>
                                <span class="badge badge-info">
                                    <i class="fa-solid fa-pen mr-2"></i> {{ $blog->author_name }}
                                </span>
                                <span class="badge">
                                    <i class="fa-solid fa-brush mr-2"></i> {{ $blog->designer_name }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    {{-- detail --}}
                                    <a class="btn btn-primary btn-outline btn-sm" href="{{ route('blog.show', $blog->id) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{-- edit --}}
                                    <a class="btn btn-primary btn-outline btn-sm" href="{{ route('blog.edit', $blog->id) }}">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    {{-- delete --}}
                                    <button class="btn btn-primary btn-outline btn-sm" style="border-top-right-radius: 0.5rem; border-bottom-right-radius: 0.5rem;" form="delForm{{ $blog->id }}"
                                        onclick="return confirm('Are you sure you want to delete this blog?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <form id="delForm{{ $blog->id }}" action="{{ route('blog.destroy', $blog->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                            <td>
                                <p class="date mb-0">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ $blog->created_at->format('d M Y') }}
                                </p>
                                <p class="time mb-0">
                                    <i class="fa-regular fa-clock"></i>
                                    {{ $blog->created_at->format('h:i A') }}
                                </p>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6 fixed bottom-0 mb-10">
            {{ $blogs->onEachSide(1)->links() }}
        </div>
    </x-card>
@endsection
