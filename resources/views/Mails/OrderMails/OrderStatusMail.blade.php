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
        .message{
            margin: 5px;
            font-weight: bold;
            font-size: medium;
        }
        .name{
            color:white;
            background: #3b82f6;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: large;
            font-weight: bold;
            border: 1px solid white;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h3>Hello, {{ $user->name }},</h3>
    {{-- <h3>Thank you for your order. Here are the details:</h3> --}}
            <p class="message">Your Order <span class="name">{{ $productVariation->product->name }}</span>
                 has been {{ $order->status }}.</p>
    <p class="greet">Thank you for shopping with us!</p>
</body>

</html>
