@extends('User.Layout.layout')
@section('content')

<div class="mx-5">
    <div class="mx-5 my-5 grid grid-cols-12">
        <div class="product lg:col-span-7 col-span-12">
            <div class="productImage my-2">
                <img class="w-2/3 rounded" src={{"/Images/System/companyBanner.jpg"}} alt="">
            </div>
                <div class="productVariations w-2/3 flex gap-2 border-2 border-blue-500 rounded py-2 px-3 bg-gray-300">
                    <div class="w-12 h-12 bg-white border-2 border-green-500 hover:border-red-600 rounded">
                        <img src={{"/Images/System/logo.png"}} alt="">
                    </div>
                    <div class="w-12 h-12 bg-white border-2 border-green-500 hover:border-red-600 rounded">
                        <img src={{"/Images/System/logo.png"}} alt="">
                    </div>
                    <div class="w-12 h-12 bg-white border-2 border-green-500 hover:border-red-600 rounded">
                        <img src={{"/Images/System/logo.png"}} alt="">
                    </div>
                </div>
                <div class="productDescription mx-5 my-2">
                    <div class="flex my-2">
                        <div class="py-1 productName">
                            <span class="bg-blue-500 rounded px-5 py-1 text-white font-bold text-2xl">Dell</span>
                        </div>
                        <div class="mb-2 py-1 productCategory">
                            <span class="bg-gray-500 rounded px-2 mx-2 py-1 text-white font-semibold text-sm"> Category: Laptops</span>
                        </div>
                    </div>
                    <div class="mb-2 py-1 productPrice">
                        <span class="bg-red-500 rounded px-5 py-1 text-white font-bold text-xl">Rs. 150000</span>
                    </div>
                    <div class="mb-2 productDesc">
                        <span class="text-md bg-gray-200 rounded px-2 py-1">This is very genuine product</span>
                    </div>
            </div>
        </div>
        <div class="buttons lg:col-span-5 col-span-12">
            <div class="flex">
                <div class="buyNow my-2 mx-2">
                    <a href=""><button class="bg-green-600 border-2 rounded hover:border-green-700 text-white font-bold px-5 py-2">Buy Now</button></a>
                </div>
                <div class="addToCart my-2">
                    <a href=""><button class="bg-indigo-600 border-2 rounded hover:border-indigo-700 text-white font-bold px-5 py-2">Add to Cart</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection