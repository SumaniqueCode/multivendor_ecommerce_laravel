@extends('User.Layout.layout')
@section('content')

<div class="mx-5">
    <div>
        <div class="my-8">
            <div class="max-w-sm mx-auto border-2 border-green-400 p-4 rounded-2xl py-8">
                <div class="mb-5 flex justify-center">
                    <img src="{{('Images/System/logo.png')}}"  class=" border-2 border-blue-500 p-2 rounded-2xl w-24"/>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Name: {{auth()->user()->name}}</h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Address: {{auth()->user()->name}}</h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Gender: {{auth()->user()->id}}</h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Email: {{auth()->user()->email}}</h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Phone: {{auth()->user()->id}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection