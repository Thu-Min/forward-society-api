@extends('templates.master')

@section('title')
    Contact
@endsection

@section('content')
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li>Contact</li>
        </ul>
    </div>

    <x-card>
        <x-card-header title="Contact List">

        </x-card-header>

        @if (count($contact) > 0)
            <div class="overflow-x-auto">
                <table class="table table-compact w-full mt-5">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contact as $item)
                            <tr>
                                <th  class="font-bold">{{ $item->id }}</th>

                                <td class="px-2 py-4">
                                    <div class="flex gap-2">
                                        <h1 class="text-start font-bold">
                                            {{ Str::limit($item->name, 30) }}
                                        </h1>
                                    </div>
                                </td>
                                <td class="px-2 py-4">
                                    {{ Str::limit($item->description, 45) }}
                                </td>
                                <td class="px-2 py-4">
                                    <h1 class="">
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ $item->created_at->format('d M Y') }}
                                    </h1>
                                    <p class="text-sm">
                                        <i class="fa-regular fa-clock"></i>
                                        {{ $item->created_at->format('h:i A') }}
                                    </p>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="btn-group">
                                        <a href="{{ route('contact.show', $item->id) }}" class="btn btn-primary btn-outline btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 fixed bottom-0 mb-10">
                    {{ $contact->links() }}
                </div>
            </div>
        @else
            <h3 class="mx-auto mt-10 text-2xl font-semibold text-center text-blue-600"> There is no Contact Data.</h3>
        @endif

    </x-card>

@endsection
