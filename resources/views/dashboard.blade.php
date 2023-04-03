@extends('templates.master')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
    <ul>
      <li>Dashboard</li>
    </ul>
</div>
<x-card>
    <x-card-header title="Dashboard">
        <a  href="{{ route('table') }}" class="btn btn-primary btn-md flex-none mr-3">
            <i class="fa fa-arrow-circle-o-left"></i>
            <span>Table</span>
        </a>
        <a  href="{{ route('form') }}" class="btn btn-primary btn-md flex-none mr-3">
            <i class="fa fa-arrow-circle-o-left"></i>
            <span>Form</span>
        </a>
    </x-card-header>
    <div class="container">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam hic officiis similique eaque laboriosam quod unde perferendis, cupiditate numquam. Amet repellat ducimus, harum, distinctio, cum veritatis labore tempore ut magni animi nesciunt? Repellendus quisquam doloribus expedita velit totam a dolore tempora fugiat reiciendis aperiam amet sequi minima, debitis repudiandae laudantium. Ratione obcaecati nam saepe quasi sequi beatae. Facilis placeat quibusdam sint dolores nam, necessitatibus temporibus quae omnis consequatur suscipit odit quaerat eius accusantium, ratione ad ullam harum dicta earum ipsa. Nostrum molestiae quae temporibus sunt eaque? Ut hic omnis delectus atque tenetur facilis maiores mollitia ab eaque odit voluptatum sequi error id vero sunt, non perferendis officiis quia quo iste eius qui! Perferendis quidem praesentium aut a dolore soluta provident excepturi minima. Quisquam quidem voluptatum rerum debitis incidunt doloremque molestias ea dolorem earum inventore. Quaerat, nesciunt? Dolorem saepe expedita recusandae cum sit sunt voluptate praesentium a dolorum ex ea molestias, accusamus laboriosam esse velit ipsum obcaecati ipsam eligendi? Voluptas sapiente, deleniti voluptates dignissimos ipsam dolore doloremque architecto vel placeat a? Accusamus exercitationem commodi rem nulla quidem, eaque quisquam voluptas neque mollitia porro in corrupti perspiciatis facilis ea explicabo aliquam minus eos accusantium fugit omnis quod eligendi? Quasi voluptates aperiam mollitia.
        </p>
        <br>
        <button class="btn btn-primary" onclick="showToast()">Click</button>
    </div>
</x-card>

@endsection
