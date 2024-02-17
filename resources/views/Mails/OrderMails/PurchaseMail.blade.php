<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding: 0;
        }
        .productImage {
            width: 200px;
            height: 150px;
            border: 1px solid white;
            border-radius: 20px;
        }
        .name{
            color:white;
            background: #3b82f6;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: larger;
            font-weight: bold;
            border: 1px solid white;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h3>Hello, {{ Auth()->user()->name }},</h3>
    <h3>Thank you for your order. Here are the details:</h3>

    <ul>
        <li>
            <span class="name">{{ $productVariation->product->name }}</span>
            {{-- <img class="productImage" src="{ asset(json_decode($productVariation['image'])[0]) }}"> --}}
            <p class="quantity">Quantity: {{ $cart->quantity }} </p>
            <p class="price"> Price per product: {{ $productVariation->price }} </p>
            <p class="total">Total: {{ $cart->quantity * $productVariation->price }}</p>
        </li>
    </ul>

    {{-- <p class="quantity">Total Amount:  $order->total_amount</p> --}}
    <p class="greet">Thank you for shopping with us!</p>
</body>

</html>
