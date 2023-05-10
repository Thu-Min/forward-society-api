@extends('templates.master')

@section('title')
    Contact Detail
@endsection

@section('content')
    {{-- breadcrumb --}}
    <div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('contact.index') }}">Contact</a></li>
            <li>Contact Detail</li>
        </ul>
    </div>
    <x-card>
        <x-card-header title="Contact Detail">

        </x-card-header>

        <div class="flex flex-warp justify-evenly">
            <div class="w-full">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Description</h3>
                        <p>{{ $contact->description }}</p>

                        <hr>

                        <h1 class=""> <b>Name : </b> {{ $contact->name }}</h1>
                        <h1 class=""> <b>Email : </b> {{ $contact->email }} </h1>
                        <h1 class=""> <b>Phone : </b> {{ $contact->phone }} </h1>
                        <h1 class=""> <b>Date : </b> {{ $contact->created_at->format('d M Y') }} </h1>
                        <h1 class=""> <b>Time : </b> {{ $contact->created_at->format('h:i A') }} </h1>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
@endsection
