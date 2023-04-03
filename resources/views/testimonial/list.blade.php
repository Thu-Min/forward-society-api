@extends('templates.master')

@section('title')
    Testimonial
@endsection

@section('content')
<div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li>Testimonial</li>
    </ul>
</div>

<x-card>
    <x-card-header title="Testimonial List">
        <a class="btn btn-primary btn-md flex-none" href="{{ route('testimonial.create') }}">
            <i class="fa fa-plus-circle"></i>
        </a>
    </x-card-header>

    @if(count($testimonial)>0)
    <div class="relative m-2 overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left dark:text-gray-400">
            <thead class="text-gray-700 uppercase text-xxs bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                       ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Infromation
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created at
                    </th>
                    <th scope="col" class="px-9 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonial as $t)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$t->id}}
                        </th>

                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <div class="w-10">
                                    <img class="rounded-full" src="{{ $t->photo }}" />
                                </div>
                                <div class="">
                                    <h1 class="text-start font-bold">
                                        {{ Str::limit($t->name, 30) }}
                                    </h1>
                                    <h4 class="text-sm text-gray-400">
                                        {{ Str::limit($t->position, 30) }}
                                    </h4>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::limit($t->description, 45) }}
                        </td>
                        <td class="px-5 py-4">
                            @if ($t->status == true)
                                <span class="badge badge-primary text-white text-cener p-3">
                                    Show
                                </span>
                            @elseif ($t->status == false)
                                <span class="badge bg-blue-300 border-blue-300 text-white text-cener p-3">
                                    Hide
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <h1 class="">
                                <i class="fa-solid fa-calendar"></i>
                                {{ $t->created_at->format("d M Y") }}
                            </h1>
                            <p class="text-sm">
                                <i class="fa-solid fa-clock"></i>
                                {{ $t->created_at->format("h:i A") }}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="btn-group">
                                <button class="btn btn-primary btn-outline btn-sm">
                                    <a href="{{ route('testimonial.edit', $t->id) }}">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                </button>

                                <form action="{{ route('testimonial.destroy', $t->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-primary btn-outline btn-sm" type="submit" onclick="return confirm('Are you sure to Delete?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-6 fixed bottom-0 mb-60">
             {{$testimonial->links()}}
        </div>
    </div>

    @else
        <h3 class="mx-auto mt-10 text-2xl font-semibold text-center text-blue-600"> There is no Testimonial Data. Add some new....</h3>
    @endif

</x-card>

@endsection
