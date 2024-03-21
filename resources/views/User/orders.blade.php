@extends('User.Layout.layout')
@section('content')
    <div class="mx-5">
        <div class="overflow-x-auto shadow-md sm:rounded-lg mx-12 my-2 border-4 border-indigo-800">
            <table
                class="text-center w-full text-sm rtl:text-right text-blue-100 dark:text-blue-100 border-separate border-spacing-1">
                <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                    <tr class="bg-blue-600 border-b border-blue-400 hover:bg-blue-800">
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Image</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Product Name</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Quantity</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Price</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Payment Method</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Status</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Order Date</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="bg-gray-100 border-b border-gray-200 text-gray-900 hover:bg-blue-300">
                            <td scope="row"
                                class="bg-gray-100 px-4 text-base font-medium whitespace-nowrap dark:text-blue-100"><img
                                    class="w-24 h-20" src="{{ asset(json_decode($order->productVariation['image'])[0]) }}"
                                    alt=""></td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                {{ $order->productVariation->product['name'] }}</td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                {{ $order->quantity }}</td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                {{ $order->productVariation['price'] }}</td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                {{ $order->payment_method }}</td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                <p class="px-3 py-1 rounded text-white {{ ($order->status == "pending" ? 'bg-green-600' : ($order->status == "Processing" ? 'bg-yellow-600' : ($order->status == "Shipped" ? 'bg-blue-600' : ($order->status == "Delivered" ? 'bg-green-600' : 'bg-red-600')))) }}"> {{ $order->status }} </p>
                            </td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                {{ $order->created_at->format('Y/m/d') }}</td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                <a href="/cancel-order/{{$order->id}}">
                                    <button
                                        class="my-2 mx-auto bg-red-600 px-5 py-2 rounded text-white font-semibold">Cancel</button>
                                </a>
                                <a href="/get-product-details/{{ $order->productVariation->product['id'] }}">
                                    <button class="my-2 mx-auto bg-blue-600 px-5 py-2 rounded text-white font-semibold">View
                                        Product</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
