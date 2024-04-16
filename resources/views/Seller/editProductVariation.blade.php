@extends('layouts.layout')
@section('content')

<div class="">
    <div class="form my-8 grid grid-cols-12">
        <div class="col-span-12 mb-3">
            <form class="max-w-6xl mx-auto border-2 border-green-400 p-4 rounded-2xl" method="post" action="/product/update-product-variation/{{ $productVariation->id }}" enctype="multipart/form-data">
                @csrf
                <legend class="font-bold text-center text-2xl mb-5">Edit PRODUCT VARIATION</legend>
                <div class="py-1 productName">
                    <span
                        class="bg-blue-500 rounded px-5 py-1 text-white font-bold text-2xl">{{ $productVariation->product->name }} Variarion: {{ $productVariation->id }}</span>
                </div>
                <input value="{{ $productVariation }}" type="hidden" name="product_id" value="{{$productVariation->product->id}}">
                <div class="grid grid-cols-12 mt-2">
                    <div class="mb-5 price mx-1 col-span-12 col-span-6">
                        <label for="price" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price <span class="text-red-500">*</span></label>
                        <input value="{{ $productVariation->price }}" type="text" id="price" name="price" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('price') border-red-300 @enderror" placeholder="Enter the price here" required>
                        @error('price')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 mx-1 col-span-12 col-span-6">
                        <label for="stock" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product in Stock <span class="text-red-500">*</span></label>
                        <input value="{{ $productVariation->stock }}" type="number" id="stock" name="stock" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('stock') border-red-300 @enderror" placeholder="Enter number of stocks" required>
                        @error('stock')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 product_color mx-1 col-span-12 col-span-6">
                        <label for="color" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Color</label>
                        <input value="{{ $productVariation->color }}" type="text" id="color" name="color" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('color') border-red-300 @enderror" placeholder="Eg: red" >
                        @error('color')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 size mx-1 col-span-12 md:col-span-6">
                        <label for="size" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Size</label>
                        <input value="{{ $productVariation->size }}" type="text" id="size" name="size" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('size') border-red-300 @enderror" placeholder="Enter Dimension or size" >
                        @error('size')
                            <div class="text-red-500 text-sm"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="mb-5 iamge mx-1 col-span-12">
                        <label for="image" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Image <span class="text-red-500">*</span></label>
                        <input value="{{ $productVariation->image }}" type="file" id="image" name="image" multiple accept="image/*" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('image') border-red-300 @enderror">
                        @error('image')
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

@endsection