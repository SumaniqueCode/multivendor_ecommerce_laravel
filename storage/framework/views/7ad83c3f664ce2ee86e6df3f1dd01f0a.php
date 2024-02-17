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
    <h3>Hello, <?php echo e($user->name, false); ?>,</h3>
    
            <p class="message">Your Order <span class="name"><?php echo e($productVariation->product->name, false); ?></span>
                 has been <?php echo e($order->status, false); ?>.</p>
    <p class="greet">Thank you for shopping with us!</p>
</body>

</html>
<?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/Mails/OrderMails/OrderStatusMail.blade.php ENDPATH**/ ?>