@extends('Seller.Layout.layout')
@section('content')
<div>
    <div>
        <div>
            <a href="/seller/add-product"><button class="my-2 mx-auto bg-green-600 px-5 py-2 rounded text-white font-semibold">Add Product</button></a>
        </div>
        <div class="m-2">
            <table class="table w-full border-2 rounded-xl border-gray-400">
                <thead>
                    <tr class="font-bold text-md text-center">
                        <td class="border-2 rounded border-gray-400">Image</td>
                        <td class="border-2 rounded border-gray-400">Name</td>
                        <td class="border-2 rounded border-gray-400">Category</td>
                        <td class="border-2 rounded border-gray-400">Price</td>
                        <td class="border-2 rounded border-gray-400">Variations</td>
                        <td class="border-2 rounded border-gray-400">Actions</td>
                    </tr>
                </thead>
                @foreach ($products as $product)
                    <tr class="font-semibold">
                        <td class="border-2 rounded border-gray-400"><img class="w-32" src="{{asset($product->product_image)}}" alt=""></td>
                        <td class="border-2 rounded border-gray-400">{{$product->product_name}}</td>
                        <td class="border-2 rounded border-gray-400">{{$product->category['name']}}</td>
                        <td class="border-2 rounded border-gray-400">{{$product->product_price}}</td>
                        <td class="border-2 rounded border-gray-400">{{$product->productVariation->count()}}</td>
                        <td class="border-2 rounded border-gray-400">
                            <a href="/seller/add-product">
                                <button class="my-2 mx-auto bg-red-600 px-5 py-2 rounded text-white font-semibold">Delete</button>
                            </a>
                            <a href="/product/get-product-details/{{$product->id}}">
                                <button class="my-2 mx-auto bg-blue-600 px-5 py-2 rounded text-white font-semibold">View</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection