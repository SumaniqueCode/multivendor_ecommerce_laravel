@extends('Seller.Layout.layout')
@section('content')

<div class="">
    @if(session('success'))
    <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white"><span>{{ session('success') }}</span></div>
    @endif
    <div class="form my-8 grid grid-cols-12">
        <div class="col-span-12">
            <form class="max-w-6xl mx-auto mx-2 border-2 border-green-400 p-4 rounded-2xl" method="post" action="/add-category" enctype="multipart/form-data">
                @csrf
                <legend class="font-bold text-center text-2xl mb-5">ADD CATEGORIES</legend>
                <div class="grid grid-cols-12">
                    <div class="mb-5 name mx-1 col-span-12 flex justify-center">
                        <label for="name" class="max-w-md my-auto block mb-2 mx-2 text-sm font-medium text-gray-900 dark:text-white">Category Name: </label>
                        <input type="text" id="name" name="name" class="my-auto max-w-md bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-300 @enderror" placeholder="Enter Category Name" required>
                        @error('name')
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