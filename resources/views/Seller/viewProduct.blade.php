@extends('layouts.layout')
@section('content')
<script>
    $(document).ready(function(){
        $(".editCard").hide();
        $('.dottedBtn').click(function() {
            // Find the closest editCard within the same parent container
            $(this).closest('.product-variation-container').find('.editCard').toggle();
        });
    })
</script>


<div class="">
    @if(session('success'))
    <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white"><span>{{ session('success') }}</span></div>
    @endif
    <div class="my-8 grid grid-cols-12 mx-2">
        <div class="col-span-12 lg:col-span-8 mx-2  border-4 rounded-xl border-gray-400 mb-3">
            <h2 class="font-bold mx-2 text-center text-2xl col-span-12">PRODUCTS DETAILS</h2>
            <div class="">
                <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400 border-separate border-spacing-2">
                    <tbody>
                        <tr class="row" scope="row">
                            {{-- <td colspan="2" rowspan="4">
                                <img src="{{asset($product->image)}}" alt="{{ $product->name }}" class="img-fluid w-80">
                            </td> --}}
                            <th class="col text-left font-semibold uppercase" scope="col">Product Name : {{ $product->name }}</th>
                            <th class="col text-left font-semibold uppercase">Category : {{ $product->category['name'] }}</th>
                            <th class="col text-left font-semibold uppercase">Status : {{ $product->status}}</th>
                        </tr>
                        {{-- <tr class="row">
                            <th class="col text-left font-semibold uppercase">Price (In NRs.) : Rs. {{ number_format($product->price, 2) }}</th>
                            <th class="col text-left font-semibold uppercase">Stock Quantity : {{ $product->stock }} items</th>
                        </tr> --}}
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Brand : {{$product->brand}}</th>
                            <th class="col text-left font-semibold uppercase">Model : {{ $product->model }}</th>
                            <th class="col text-left font-semibold uppercase">Origin : {{ $product->origin}}</th>
                        </tr>
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Description : </th>
                            <td class="col">
                                @if (strlen($product->description) > 1000)
                                {{ Illuminate\Support\Str::limit($product->description, $limit = 1000, $end = '...') }}
                                @else
                                {{ $product->description }}
                                @endif
                            </td>
                        </tr>
                        <tr class="row text-center">
                            <th class="col" colspan="3">
                                <a href="/product/edit-product/{{$product->id}}"><button id="editBtn" class="bg-blue-700 hover:bg-blue-600 text-white py-2 px-3 mb-3 rounded-lg shadow-md">Edit Product</button></a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="">
                @foreach ($product->productVariation as $productVariation)
                <div class="product-variation-container border-t-4 border-gray-400 rounded-3xl">
                    <div class="flex justify-center">
                        <h2 class=" ms-auto text-center font-bold text-2xl mt-2">Variation: {{$productVariation->id}}</h2>
                        <button id="dottedBtn" class="dottedBtn text-xl ms-auto mx-4 mt-4 bg-gray-100 hover:bg-gray-300 font-bold border rounded text-center px-2 text-blue-800">•••</button> 
                    </div>
                    <div class="relative w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <div class="flex">
                            @foreach (json_decode($productVariation->image) as $productImage)
                                <img  class="img-fluid w-32 mx-auto" src="{{asset($productImage)}}" alt="{{ $productVariation->product['name'] }}">
                            @endforeach
                        </div>
                        <div class="flex justify-between mx-5 my-2">
                            <p class="col text-left font-semibold uppercase">Price (In NRs.) : Rs. {{ number_format($productVariation->price, 2) }}</p>
                            <p class="col text-left font-semibold uppercase">Stock Quantity : {{ $productVariation->stock }} items</p>
                            <p class="col text-left font-semibold uppercase">Color : {{ $productVariation->color}}</p>
                            <p class="col text-left font-semibold uppercase">Size : {{ $productVariation->size}}</p>
                        </div>
                        <div id="editCard" class="editCard absolute right-5 top-1 flex flex-col bg-white border py-3 px-2 w-1/5 rounded-lg shadow-lg border border-2 border-gray-400">
                            <a href="/product/edit-product-variation/{{$productVariation->id }}" class="text-black font-semibold mb-1 bg-gray-300 hover:bg-blue-700 hover:text-white rounded-lg text-md w-full sm:w-auto px-8 py-2 text-center">Edit</a>
                            <a href="/product/product/delete-product-variation/{{$productVariation->id }}" class="text-black font-semibold bg-gray-300 hover:bg-red-700 hover:text-white rounded-lg text-md w-full sm:w-auto px-max py-2 text-center">Delete</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="variations col-span-12 lg:col-span-4 mx-2">
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
                                <label for="price" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price <span class="text-red-500">*</span></label>
                                <input type="text" id="price" name="price" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('price') border-red-300 @enderror" placeholder="Enter the price here" required>
                                @error('price')
                                    <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-5 mx-1 col-span-12 col-span-6">
                                <label for="stock" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product in Stock <span class="text-red-500">*</span></label>
                                <input type="number" id="stock" name="stock" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('stock') border-red-300 @enderror" placeholder="Enter number of stocks" required>
                                @error('stock')
                                    <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-5 product_color mx-1 col-span-12 col-span-6">
                                <label for="color" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Color</label>
                                <input type="text" id="color" name="color" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('color') border-red-300 @enderror" placeholder="Eg: red" >
                                @error('color')
                                    <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-5 size mx-1 col-span-12 md:col-span-6">
                                <label for="size" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Size</label>
                                <input type="text" id="size" name="size" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('size') border-red-300 @enderror" placeholder="Enter Dimension or size" >
                                @error('size')
                                    <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                                @enderror
                            </div>
                            <div class="mb-5 iamge mx-1 col-span-12">
                                <label for="image" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Image <span class="text-red-500">*</span></label>
                                <input type="file" id="image" name="image" multiple accept="image/*" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('image') border-red-300 @enderror">
                                @error('image')
                                    <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                                @enderror
                                <script>
                                    $documen. ready(function(){
                                        $(#image)
                                        var img = document.getElementById("image").value;
                                        console.log(img);
                                    })
                                    </script>
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