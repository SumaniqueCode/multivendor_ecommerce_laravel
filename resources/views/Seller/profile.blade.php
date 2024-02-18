@extends('Seller.Layout.layout')

@section('content')

<div class="mx-5">
    <div>
        <div class="my-8">
            <div class="max-w-sm mx-auto border-2 border-green-400 p-4 rounded-2xl py-8">
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
                    <h3 class="text-base font-medium text-left">Email: {{auth()->user()->email}}</h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Phone: {{auth()->user()->phone}}</h3>
                </div>
            </div>
            <div class="top-2/3 left-2/3 absolute">
               <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                   <button class="font-medium bg-red-600 border rounded text-white px-2 py-1"> {{ __('LOGOUT') }}</button>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection