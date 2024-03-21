@extends('layouts.layout')

@section('content')

<div class="mx-5 my-8 grid grid-cols-12">
        <div class="col-span-8">
            <div class="max-w-md ms-auto border-2 border-green-400 p-4 rounded-2xl py-8">
                <div class="mb-5 flex justify-center">
                    <img src="{{asset(auth()->user()->profile_image)}}"  class=" border-2 border-blue-500 rounded w-24 h-24"/>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Name: {{auth()->user()->name}}</h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Address: {{auth()->user()->address}}</h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Gender: {{auth()->user()->gender}}</h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">DOB: <?php
                        $date_of_birth = auth()->user()->date_of_birth;
                        $timestamp = strtotime($date_of_birth);
                        $formatted_date = date("F d, Y", $timestamp);
                        echo $formatted_date; ?>
                        </h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Email: {{auth()->user()->email}}</h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Phone: {{auth()->user()->phone}}</h3>
                </div>
            </div>
        </div>
        <div class="col-span-4 my-2 mx-2">
            <div class="top-1/4 left-2/3 my-2">
                <a href="/edit-user"><button class="bg-blue-700 text-white rounded p-1 px-12 font-medium">Edit</button></a>
            </div>
            <div class="top-2/3 left-2/3 my-2">
               {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> --}}
                <a class="" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                   <button class="font-medium bg-red-600 border rounded text-white px-8 py-1"> {{ __('LOGOUT') }}</button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection