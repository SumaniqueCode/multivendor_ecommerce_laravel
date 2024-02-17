<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order. Here are the details:</p>

    <ul>
        <li>
            <strong><?php echo e($productVariation->product->name, false); ?></strong><br>
            
            Quantity: <?php echo e($cart->quantity, false); ?><br>
            Price per product: <?php echo e($productVariation->price, false); ?><br>
            Total: <?php echo e($cart->quantity * $productVariation->price, false); ?>

        </li>
    </ul>

   
    <p>Thank you for shopping with us!</p>
</body>
<?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/Mails\OrderMails\PurchaseMail.blade.php ENDPATH**/ ?>