@extends('templates.master')

@section('title')
    Table Sample
@endsection

@section('content')
{{-- breadcrumb --}}
<div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
    <ul>
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li>Table</li>
    </ul>
</div>
<x-card>
    <x-card-header title="List">
        <a  href="{{ route('form') }}" class="btn btn-primary btn-md flex-none mr-3">
            <i class="fa fa-arrow-circle-o-left"></i>
            <span>Form</span>
        </a>

        <a class=" btn btn-primary btn-md flex-none">
            <i class="fa fa-plus-circle"></i>
        </a>
    </x-card-header>
      <table class="table w-full">
        <!-- head -->
        <thead >
          <tr>
            <th></th>
            <th>Name</th>
            <th>Job</th>
            <th>Control</th>
            <th>Created at</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <tr>
            <th>1</th>
            <td>Cy Ganderton</td>
            <td>Quality Control Specialist</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-primary btn-outline btn-sm">
                  <i class="fa-solid fa-edit"></i>
                </button>
                <button class="btn btn-primary btn-outline btn-sm">
                  <i class="fa-solid fa-eye"></i>
                </button>
                <button class="btn btn-primary btn-outline btn-sm">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>
            </td>
            <td>
              <h1 class="">Jan 2023</h1>
              <p class="text-sm">18:00 ~ 21:00</p>
            </td>
          </tr>
          <!-- row 2 -->
          <tr>
            <th>2</th>
            <td>Hart Hagerty</td>
            <td>Desktop Support Technician</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-primary btn-outline btn-sm">
                  <i class="fa-solid fa-edit"></i>
                </button>
                <button class="btn btn-primary btn-outline btn-sm">
                  <i class="fa-solid fa-eye"></i>
                </button>
                <button class="btn btn-primary btn-outline btn-sm">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>
            </td>
            <td>Jan 2023</td>
          </tr>
          <!-- row 3 -->
          <tr>
            <th>3</th>
            <td>Brice Swyre</td>
            <td>Tax Accountant</td>
            <td>
              <div class="btn-group">
                <button class="btn btn-primary btn-outline btn-sm">
                  <i class="fa-solid fa-edit"></i>
                </button>
                <button class="btn btn-primary btn-outline btn-sm">
                  <i class="fa-solid fa-eye"></i>
                </button>
                <button class="btn btn-primary btn-outline btn-sm">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>
            </td>
            <td>Jan 2023</td>
          </tr>
        </tbody>
      </table>
</x-card>
@endsection
