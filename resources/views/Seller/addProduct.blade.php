@extends('Seller.Layout.layout')
@section('content')

<div class="">
    <div class="form my-8">
        <form class="max-w-xl mx-auto border-2 border-green-400 p-4 rounded-2xl py-8" method="post" action="">
            <legend class="font-bold text-center text-2xl mb-5">ADD PRODUCTS</legend>
            <div class="mb-5 name">
                <label htmlFor="product_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Product Name</label>
                <input type="text" id="product_name" name="product_name" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter product title" required>
            </div>
            <div class="mb-5">
                <label htmlFor="product_category" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="product_category" name="product_category" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required >
                  @foreach ($categories as $category)
                    <option id="" name="" value="{{$category->id}}" class=""></option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5 desc">
                <label htmlFor="product_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">product Description</label>
                <textarea type="text" id="product_description" name="product_description" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm pb-24 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter minumum 100 words" required></textarea>
            </div>
            <div class="mb-5">
                <label htmlFor="productDeadline" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">product Deadline</label>
                <input type="date" id="productDeadline" name="productDeadline" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="mb-5">
                <label htmlFor="members" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter members in this product</label>
                <input type="text" id="members" name="members" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter your members here" required />
            </div>
            <div class="mb-5">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-8 mt-5 py-2.5 text-center">SUBMIT</button>
            </div>
        </form>
      </div>
</div>

@endsection