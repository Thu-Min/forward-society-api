@extends('templates.master')

@section('title')
    Form Sample
@endsection

@section('content')
{{-- breadcrumb --}}
<div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
    <ul>
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li>Form</li>
    </ul>
</div>
<x-card>
    <x-card-header title="Form">
        <a  href="{{ route('table') }}" class="btn btn-primary btn-md flex-none mr-3">
            <i class="fa fa-arrow-circle-o-left"></i>
            <span>Table</span>
        </a>
        <a class="btn btn-primary btn-md flex-none">
            <i class="fa fa-plus-circle"></i>
        </a>
    </x-card-header>
    <div class="grid grid-cols-6 gap-5 ">
        <div class="form-control w-full col-span-3">
          <label class="label">
            <span class="label-text ">First Name</span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full"
          />
        </div>
        <div class="form-control col-span-3">
          <label class="label">
            <span class="label-text">Last Name</span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full"
          />
        </div>
        <div class="form-control w-full col-span-3">
          <label class="label">
            <span class="label-text">Email address</span>
          </label>
          <input
            type="text"
            placeholder="Type here"
            class="input input-bordered w-full col-span-3"
          />
        </div>
        <div class="form-control w-full col-span-3">
          <label class="label">
            <span class="label-text">Pick a file</span>
          </label>
          <input
            type="file"
            class="file-input file-input-bordered w-full file-input-primary"
          />
        </div>
    </div>
    <button class="btn btn-primary mt-5">Button</button>
</x-card>

@endsection
