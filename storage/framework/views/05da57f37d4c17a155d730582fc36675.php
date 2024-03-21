
<?php $__env->startSection('content'); ?>
    <script>
        $(document).ready(function() {
            $("#cart").hide();
            var selectedCartIds = [];
            let totalCartQuantity = 0;
            let totalPrice = 0;

            // Checkbox click event handler
            $('input[type="checkbox"]').on('change', function() {
                var selectedItems = JSON.parse($(this).val());
                let cart = selectedItems.cart;
                let product = selectedItems.product;
                if ($(this).prop('checked')) {
                    selectedCartIds.push(cart.id);
                    totalCartQuantity = totalCartQuantity + cart.quantity;
                    totalPrice = totalPrice + (cart.quantity * product.price);
                } else {
                    selectedCartIds = selectedCartIds.filter(id => id !== cart.id);
                    totalCartQuantity = totalCartQuantity - cart.quantity;
                    totalPrice = totalPrice - (cart.quantity * product.price);
                }
                document.getElementById("totalCartItem").innerHTML = selectedCartIds.length;
                document.getElementById("totalCartQuantity").innerHTML = totalCartQuantity;
                document.getElementById("totalPrice").innerHTML = "Rs. " + totalPrice;
            });

            // Checkout button click event handler
            $('#checkoutBtn').on('click', function() {
                $('#selectedCartIdsInput').val(selectedCartIds.join(','));
                $('#checkoutform').submit();
            });

            //for updating cart value
            $("#updatequantity").on('change', function() {
                var newQuantity = $(this).val();
                var cartData = document.getElementById("cartData").value;
                console.log("Cart data: ", cartData);
                var cart = JSON.parse(cartData).cart;
                var productVariation = JSON.parse(cartData).product;
                var cartPrice = document.getElementById("cartPrice");
                $.ajax({
                    url: '/update-cart',
                    type: 'post',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: cart.id,
                        quantity: newQuantity,
                    },
                    success: function(response) {
                        cartPrice.innerHTML = ("Rs. " + response.cart.quantity + " X " +
                            productVariation.price + " = " + response.cart.quantity *
                            productVariation.price);
                        cartPrice.style.color = "black";
                        console.log(response);
                    },
                    error: function(error) {
                        cartPrice.innerHTML = error.responseJSON.message;
                        cartPrice.style.color = "red";
                        console.log(error.responseJSON.message);
                    }
                });
            });
        });
    </script>

    <div class="mx-5">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-white text-center p-3 mt-2 font-semibold text-lg bg-red-600 border rounded-lg">
                        <span><?php echo e($message, false); ?></span></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-span-12">
                <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-white text-center p-3 mt-2 font-semibold text-lg bg-red-600 border rounded-lg">
                        <span><?php echo e($message, false); ?></span></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div id="cartdesc"
                class="cartdesc h-max border-4 border-gray-500 rounded-xl bg-white col-span-12 lg:col-span-8 m-2">
                <div class="bg-indigo-500 text-white font-bold p-2 flex justify-center border rounded-2xl">
                    <h3 class="mx-auto">CART DETAILS</h3>
                </div>
                <?php if($carts->count() > 0): ?>
                    <table class="table w-full">
                        <tbody class="">
                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input type="checkbox" id="cartData" name="cart_id"
                                            value="<?php echo e(json_encode(['cart' => $cart, 'product' => $cart->productVariation]), false); ?>"
                                            class="border rounded"></td>
                                    <td rowspan="2" class="">
                                        <img class="rounded my-auto h-20 w-24 mx-2"
                                            src=<?php echo e(asset(json_decode($cart->productVariation['image'])[0]), false); ?>

                                            alt="">
                                    </td>
                                    <td class="w-28"><?php echo e($cart->productVariation['name'], false); ?></td>
                                    <td class="flex gap-1 justify-end">
                                        <label for="" class="my-auto mx-5">Quantity: </label>
                                        <input class="w-72 pl-2 border rounded-xl mt-1" type="number" id="updatequantity"
                                            name="quantity" value="<?php echo e($cart->quantity, false); ?>">
                                    </td>
                                    <td class="text-left">
                                        <a class="me-2 my-auto" href="/delete-cart/<?php echo e($cart->id, false); ?>"><button
                                                class="px-2 py-1 bg-red-500 text-white font-semibold rounded-lg">delete</button></a>
                                    </td>
                                </tr>
                                <tr class="border-b-2 border-gray-500">
                                    <td id="productStock" colspan="4" class="text-right">Stock:
                                        <?php echo e($cart->productVariation['stock'], false); ?></td>
                                    <td id="cartPrice" colspan="2" class="text-right italic px-2">
                                        Rs. <?php echo e($cart->quantity, false); ?> X <?php echo e($cart->productVariation['price'], false); ?> = Rs.
                                        <?php echo e($cart->productVariation['price'] * $cart->quantity, false); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="font-medium py-6 text-lg text-center">Your Cart is Empty.</p>
                <?php endif; ?>
            </div>
            <div id="cartSummary"
                class=" h-max cartdesc border-4 border-gray-500 rounded-xl bg-white col-span-12 lg:col-span-4 m-2">
                <div class="bg-indigo-500 text-white font-bold p-2 flex justify-center border rounded-2xl">
                    <h3 class="mx-auto">CART SUMMARY</h3>
                </div>
                <?php if($carts->count() > 0): ?>
                    <table class="table table-dark w-full border-separate border-spacing-2">
                        <tbody class="">
                            <tr>
                                <td>Discount Voucher: </td>
                                <td class="flex gap-1" colspan="">
                                    <form action="/add-discount-voucher" method="post" class="flex me-1 my-auto">
                                        <?php echo csrf_field(); ?>
                                        <input class="border rounded" type="hidden" name="id"
                                            value="<?php echo e($cart->id, false); ?>">
                                        <div class="relative">
                                            <input class="w-72 pl-2 border rounded-xl" type="text" id="discount_voucher"
                                                name="discount_voucher" value="">
                                            <a class="absolute inset-y-0 right-0 my-auto" href="/add-discount-voucher">
                                                <button
                                                    class="px-2 py-1 mt-1 me-0.5 pt-0.5 bg-green-500 text-white font-semibold rounded-lg">Apply</button>
                                            </a>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <tr class="border-b-2 border-gray-500 border-t-2">
                                <td colspan="" class="">Total Items:</td>
                                <td id="totalCartItem" class="text-center">
                                    0
                                </td>
                            </tr>
                            <tr class="border-b-2 border-gray-500 border-t-2">
                                <td id="" colspan="" class="">Total Quantity:</td>
                                <td id="totalCartQuantity" class="text-center">
                                    0
                                </td>
                            </tr>
                            <tr class="border-b-2 border-gray-500 border-t-2">
                                <td>Total Price: </td>
                                <td id="totalPrice" class="text-center">
                                    Rs. 0 </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <form id="checkoutform" action="/cart-checkout-view" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="mt-2 col-span-12 ms-auto">
                                <input type="hidden" name="cart_ids[]" id="selectedCartIdsInput" value="">
                                <button type="submit" id="checkoutBtn"
                                    class="w-full hover:bg-green-600 bg-green-700 border rounded-lg p-2 text-white text-lg font-bold">CHECK
                                    OUT</button>
                            </div>
                        </form>
                    </div>
            </div>
        <?php else: ?>
            <p class="font-medium py-6 text-lg text-center">Your Cart is Empty.</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/User/cart.blade.php ENDPATH**/ ?>