@extends('Seller.Layout.layout')
@section('content')

<div class="">
    @if(session('success'))
    <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white"><span>{{ session('success') }}</span></div>
    @endif
    <div class="my-8 grid grid-cols-12">
        <div class="col-span-12 lg:col-span-8 mx-2  border-4 rounded-xl border-gray-400 mb-3">
            <h2 class="font-bold text-center text-2xl mb-5 col-span-12">PRODUCTS DETAILS</h2>
            <div class="">
                <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400 border-separate border-spacing-2">
                    <tbody>
                        <tr class="row" scope="row">
                            <td colspan="2" rowspan="4">
                                <img src="{{asset($product->product_image)}}" alt="{{ $product->product_name }}" class="img-fluid w-80">
                            </td>
                            <th class="col text-left font-semibold uppercase" scope="col">Product Name : {{ $product->product_name }}</th>
                            <th class="col text-left font-semibold uppercase">Category : {{ $product->category['name'] }}</th>
                        </tr>
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Price (In NRs.) : Rs. {{ number_format($product->product_price, 2) }}</th>
                            <th class="col text-left font-semibold uppercase">Stock Quantity : {{ $product->stock }} items</th>                        </tr>
                        <tr>
                            <th class="col text-left font-semibold uppercase">Color : {{ $product->product_color}}</th>
                            <th class="col text-left font-semibold uppercase">Origin : {{ $product->origin_country}}</th>
                        </tr>
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Brand : {{$product->product_brand}}</th>
                            <th class="col text-left font-semibold uppercase">Model : {{ $product->model }}</th>
                            <th class="col text-left font-semibold uppercase"></th>
                        </tr>
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Description : </th>
                            <td class="col" colspan="5">
                                @if (strlen($product->product_description) > 1000)
                                {{ Illuminate\Support\Str::limit($product->product_description, $limit = 1000, $end = '...') }}
                                @else
                                {{ $product->product_description }}
                                @endif
                            </td>
                        </tr>
                        <tr class="row text-center">
                            <th class="col" colspan="6">
                                <a href="/product/edit-product/{{$product->id}}"><button id="editBtn" class="bg-blue-700 hover:bg-blue-600 text-white py-2 px-3 mb-3 rounded-lg shadow-md">Edit Product</button></a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="">
                @foreach ($productVariations as $productVariation)
                <div class="border-t-4 border-gray-400 rounded-3xl">
                <h2 class="text-center font-bold text-xl mt-2">Variation: {{$productVariation->id}}</h2>
                    <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="row" scope="row">
                                <td colspan="2" rowspan="3">
                                    <img  class="img-fluid w-32 mx-auto" src="{{asset($productVariation->product_image)}}" alt="{{ $productVariation->product['name'] }}">
                                </td>
                            </tr>
                            <tr class="row">
                                <th class="col text-left font-semibold uppercase">Price (In NRs.) : Rs. {{ number_format($productVariation->product_price, 2) }}</th>
                                <th class="col text-left font-semibold uppercase">Color : {{ $productVariation->product_color}}</th>
                            </tr>
                            <tr>
                                <th class="col text-left font-semibold uppercase">Stock Quantity : {{ $productVariation->stock }} items</th>
                            </tr>
                            <tr class="row text-center">
                                <th class="col" colspan="6">
                                    <a href="/product-variation/edit-product/{{$productVariation->id}}"><button id="editBtn" class="bg-blue-700 hover:bg-blue-600 text-white py-2 px-3 mb-3 rounded-lg shadow-md">Edit Product Variation</button></a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
        <div class="product_variations col-span-12 lg:col-span-4 mx-2">
            {{-- <div class="variation_button">
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-8 mb-3 py-2.5 text-center">Add Variations</button>
            </div> --}}
            <div class="col-span-12 mb-3">
                    <form class="max-w-6xl mx-auto border-2 border-green-400 p-4 rounded-2xl" method="post" action="/product/add-product-variation" enctype="multipart/form-data">
                        @csrf
                        <legend class="font-bold text-center text-2xl mb-5">ADD PRODUCT VARIATION</legend>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="grid grid-cols-12">
                            <div class="mb-5 price mx-1 col-span-12 col-span-6">
                                <label for="product_price" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
                                <input type="text" id="product_price" name="product_price" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('product_price') border-red-300 @enderror" placeholder="Enter the price here" required>
                                @error('product_price')
                                    <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-5 color mx-1 col-span-12 col-span-6">
                                <label for="product_color" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Color</label>
                                <input type="text" id="product_color" name="product_color" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('product_color') border-red-300 @enderror" placeholder="Eg: red" required>
                                @error('product_color')
                                    <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-5 mx-1 col-span-12 col-span-6">
                                <label for="stock" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product in Stock</label>
                                <input type="number" id="stock" name="stock" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('stock') border-red-300 @enderror" placeholder="Enter number of stocks" required>
                                @error('stock')
                                    <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-5 iamge mx-1 col-span-12 col-span-6">
                                <label for="product_image" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Image</label>
                                <input type="file" id="product_image" name="product_image" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('product_image') border-red-300 @enderror">
                                @error('product_image')
                                    <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-5 col-span-12 mx-auto">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-8 mt-5 py-2.5 text-center">SUBMIT</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection