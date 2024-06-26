
<?php $__env->startSection('content'); ?>
    <script>
        $(document).ready(function() {
            $("#deliveryAddressSelector").on('change', function() {
                let newDeliveryAddressId = $(this).val();
                document.getElementById("delivery_address_id").value = newDeliveryAddressId;
            });

            let totalAmount = $("#orderTotalPrice").text();
            let productName = $("#ProductName").text();
            $("#checkoutBtn").on('click', function(e) {
                e.preventDefault();
                let paymentMethod = $("input[name='payment_method']:checked").val();
                let deliveryAddress = $("#deliveryAddressSelector").val();

                if (!paymentMethod) {
                    $("#paymentError").text("Payment Method is Required");
                    return;
                }
                if (!deliveryAddress) {
                    $('#deliveryAddressError').text("Please select delivery address");
                    return;
                }

                //Khalti Payment Script
                if (paymentMethod == "Khalti") {
                    var config = {
                        // replace the publicKey with yours
                        "publicKey": "test_public_key_9798610a8ece41da9e23df43f411fb09",
                        "productIdentity": "1234567890",
                        "productName": productName,
                        "productUrl": "http://cchub.com/"+productName,
                        "paymentPreference": [
                            "KHALTI",
                            "EBANKING",
                            "MOBILE_BANKING",
                            "CONNECT_IPS",
                            "SCT",
                        ],
                        "eventHandler": {
                            onSuccess(payload) {
                                // hit merchant api for initiating verfication
                                console.log(payload);
                                $("form").submit();
                            },
                            onError(error) {
                                console.log(error);
                            },
                            onClose() {
                                console.log('widget is closing');
                            }
                        }
                    };


                    var checkout = new KhaltiCheckout(config);
                    checkout.show({
                        amount: totalAmount * 100
                    });
                }else{
                    $("form").submit();
                }
            });
        });
    </script>
    <div class="mx-5">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <?php if(session('success')): ?>
                    <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white">
                        <span><?php echo e(session('success'), false); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-span-12">
                <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-white text-center p-3 mt-2 font-semibold text-lg bg-red-600 border rounded-lg">
                        <span><?php echo e($message, false); ?></span>
                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div id="cartdesc"
                class="cartdesc h-max border-4 border-gray-500 rounded-xl bg-white col-span-12 lg:col-span-8 m-2">
                <div class="bg-indigo-500 text-white font-bold p-2 flex justify-center border rounded-2xl">
                    <h3 class="mx-auto">ORDER DETAILS</h3>
                </div>
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mx-2 my-2 grid grid-cols-12 border-2 border-gray-200 rounded-2xl">
                        <div class="product md:col-span-6 col-span-12">
                            <div class="productImage my-2 mx-2">
                                <img class=" w-1/2 lg:w-1/3 rounded"
                                    src="<?php echo e(asset(json_decode($cart->productVariation->image)[0]), false); ?>"
                                    alt=<?php echo e($cart->productVariation->product->name, false); ?>>
                            </div>
                        </div>
                        <div class="md:col-span-6 mx-2 my-2 col-span-12">
                            <div class="productDescription my-2">
                                <div class="py-1 productName">
                                    <span id="ProductName"
                                        class="bg-blue-500 rounded px-5 py-1 text-white font-bold text-2xl"><?php echo e($cart->productVariation->product->name, false); ?></span>
                                </div>
                                <div class="productCategory">
                                    <span class="rounded mx-2 font-semibold text-lg"> Category:
                                        <?php echo e($cart->productVariation->product->category->name, false); ?></span>
                                </div>
                                <div class="flex">
                                    <span id="product_brand" class="mx-2 rounded font-semibold text-md"> Brand:
                                        <?php echo e($cart->productVariation->product->brand, false); ?></span>
                                    <span id="product_model" class="mx-2 rounded font-semibold text-md"> Model:
                                        <?php echo e($cart->productVariation->product->model, false); ?></span>
                                </div>
                                <div class="flex">
                                    <span id="product_color" class="mx-2 rounded font-semibold text-md"> Color:
                                        <?php echo e($cart->productVariation->color, false); ?></span>
                                    <span id="origin_country" class="mx-2 rounded font-semibold text-md"> Product Origin:
                                        <?php echo e($cart->productVariation->product->origin, false); ?>

                                    </span>
                                </div>
                                <div class="mb-2 productPrice">
                                    <span id="product_brand" class="rounded mx-2 font-bold text-xl">Rs.
                                        <?php echo e($cart->productVariation->price, false); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="col-span-12 lg:col-span-4">
                <div id="deliveryDetails"
                    class="h-max cartdesc border-4 border-gray-500 rounded-xl bg-white col-span-12 lg:col-span-4 m-2">
                    <div class="bg-indigo-500 text-white font-bold p-2 flex justify-center border rounded-2xl">
                        <h3 class="mx-auto">Delivery Details</h3>
                    </div>
                    <?php if($deliveryAddress->count() > 0): ?>
                        <select class="deliveryAddressSelector my-1 mx-5  border rounded w-4/5" name=""
                            value="" id="deliveryAddressSelector">
                            <option value="">Select Delivery Address</option>
                            <?php $__currentLoopData = $deliveryAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option id="deliveryAddressId" class="deliveryAddressId" value="<?php echo e($delivery->id, false); ?>">
                                    <?php echo e($delivery->delivery_point, false); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php else: ?>
                        <h4>No Delivery Address Available create new one</h4>
                    <?php endif; ?>
                    <p id="deliveryAddressError" class="mx-4 text-red-500 font-semibold"></p>
                    <a href="/add-delivery-address">
                        <button id="addressBtn"
                            class="w-full hover:bg-green-600 bg-green-700 border rounded-lg p-2 text-white text-lg font-bold">
                            Add New Delivery Address</button></a>
                </div>
                <div id="cartSummary" class=" h-max cartdesc border-4 border-gray-500 rounded-xl bg-white m-2">
                    <div class="bg-indigo-500 text-white font-bold p-2 flex justify-center border rounded-2xl">
                        <h3 class="mx-auto">Order SUMMARY</h3>
                    </div>
                    <table class="table table-dark w-full border-separate border-spacing-2">
                        <tbody class="">
                            <tr>
                                <td>Discount Voucher: </td>
                                <td class="flex gap-1" colspan="">
                                    <form action="/add-discount-voucher" method="post" class="flex me-1 my-auto">
                                        <?php echo csrf_field(); ?>
                                        <input class="border rounded" type="hidden" name="id" value="">
                                        <div class="flex">
                                            <input class="w-72 pl-2 borderl rounded-xl" type="text" id="discount_voucher"
                                                name="discount_voucher" value="">
                                            <a class="my-auto absolute -z-50" href="/add-discount-voucher">
                                                <button
                                                    class="px-2 py-1 me-0.5 bg-green-500 text-white font-semibold rounded-lg">Apply</button>
                                            </a>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <tr class="border-b-2 border-gray-500 border-t-2">
                                <td colspan="" class="">Total Item:</td>
                                <td class="text-center">
                                    <?php echo $cart->count();
                                    ?>
                                </td>
                            </tr>
                            <tr class="border-b-2 border-gray-500 border-t-2">
                                <td colspan="" class="">Total Quantity:</td>
                                <td id="orderTotalQuantity" class="text-center">
                                    <?php echo $cart->quantity; ?>
                                </td>
                            </tr>
                            <tr class="border-b-2 border-gray-500 border-t-2">
                                <td>Total Price: </td>
                                <td id="orderTotalPrice" class="text-center">
                                    <?php echo $cart->quantity * $cart->productVariation->price; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <form action="/checkout" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="payments">
                                <!-- Payment Methods -->
                                <h3 class="font-bold text-xl m-2">Payment Methods</h3>
                                <div class="flex">
                                    <div class="flex mx-auto">
                                        <input class="my-auto border-2 h-5 w-5" id="khalti-payment-button" type="radio"
                                            name="payment_method" value="Khalti" required>
                                        <img src="<?php echo e(asset('Images/System/khalti.png'), false); ?>" alt="Khalti Logo"
                                            class="mx-2 w-32 h-12 rounded bg-white shadow mr-2">
                                    </div>
                                    <div class="flex mx-auto">
                                        <input class="my-auto border-2 h-5 w-5" id="payment_method" type="radio"
                                            name="payment_method" value="COD" required>
                                        <img src="<?php echo e(asset('Images/System/COD.png'), false); ?>" alt="COD"
                                            class="mx-2 w-24 h-12 rounded bg-white shadow mr-2">
                                    </div>
                                </div>
                                <p id="paymentError" class=" mx-4 text-red-500 font-semibold"></p>
                            </div>
                            <div class="mt-2 col-span-12 ms-auto">
                                <input type="hidden" id="delivery_address_id" name="delivery_address_id"
                                    value="">
                                <input type="hidden" name="carts" id="CartData" value="<?php echo e(json_encode($carts), false); ?>">
                                <input type="hidden" class="" name="status" value="pending">
                                <input type="hidden" class="" name="payment_status" value="unpaid">
                                <button type="submit" id="checkoutBtn"
                                    class="w-full hover:bg-green-600 bg-green-700 border rounded-lg p-2 text-white text-lg font-bold">
                                    CHECKOUT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/User/checkout.blade.php ENDPATH**/ ?>