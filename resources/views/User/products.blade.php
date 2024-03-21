@extends('layouts.layout')
@section('content')

<div class="mx-5">
    <div class="col-span-12">
        @error('quantity')
        <div class="text-white text-center p-3 mt-2 font-semibold text-lg bg-red-600 border rounded-lg"><span>{{ $message }}</span></div>
        @enderror
      </div>
    <div class="mb-2 grid grid-cols-12 xl:grid-cols-5">
        @foreach ($products as $product)
        <div class="product xl:col-span-1 lg:col-span-3 md:col-span-4 sm:col-span-6 col-span-12 mb-3 mx-2 my-2">
            <div class="">
                <div class="w-full h-full hover:ms-1 hover:border-l-4 max-w-sm bg-white border-b-4 border-r-4 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="/get-product-details/{{$product->id}}">
                        @foreach (json_decode($product->productVariation->first()['image']) as $productImage )
                            <img class="py-4 px-8 h-64 rounded-3xl mx-auto my-auto" src="{{ asset($productImage) }}" alt="{{ $product->name }}">                                                       
                        @endforeach
                    </a>
                    <div class="px-5 pb-5">
                        <a href="/get-product-details/{{$product->id}}">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                @for ($i = 0; $i < 5; $i++)                            
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg> 
                                @endfor
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl md:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white my-auto">Rs. {{$product->productVariation->first()['price']}}</span>
                            <form method="post" action="/add-to-cart">
                                @csrf
                                <input type="hidden" name="id" value={{$product->productVariation->first()['id']}}>
                                <input type="hidden" name="quantity" value="">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        @endforeach
    </div>
</div>
@endsection