@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row">
            {{-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
            <div class="col-md-4 col-12 companyBanner mb-3">
                <img class="w-75 border rounded" src={{"/Images/System/companyBanner.jpg"}} alt="">
            </div>
            <div class="col-md-7 col-12 mb-3">
                <h1 class="">Introduction</h1>
                <p>Computer Component hub is an ecommerce website that provides platform for buying or selling
                    of computer components in very reasonable price. This is free to use platform and anyone can we it.
                    Our main motive is to decrease the huge margin in price of components taken by different
                    retailers and mediators.
                </p>
                <a href="/moreIntro" class="text-danger fw-bold my-auto">Read more...</a>
            </div>

            <div class="col-md-7 col-12 whyUs">
                <h1>Why choose Us</h1>
                <ul>
                    <li>We protect the people who are less aware about the genuine products and gets scammed easily.</li>
                    <li>Provide platforms to buy or sell computer components easily.</li>
                    <li>Provide actual price tagging of components.</li>
                    <li>Provide easily accessible marketplace for users and sellers.</li>
                    <li>Provide components to users as cheap as possible.</li>
                    <li>Decrease the mediators between Manufacturers and users in market.</li>
                </ul>
            </div>
            <div class="whyUsImage col-md-4 col-12 mx-auto mb-3">
                <img class="w-75 border rounded" src={{"/Images/System/whyUs.jpg"}} alt="">
            </div>
        </div>
    </section>
@endsection
