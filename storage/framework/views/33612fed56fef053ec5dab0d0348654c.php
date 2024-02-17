
<?php $__env->startSection('content'); ?>

<div class="mx-5">
<script>
        function inputListener() {
            var requestQuantity = document.getElementById("requestQuantity").value;
            var checkOutQuantity = document.getElementById("checkOutquantity");
            var cartQuantity = document.getElementById("cartquantity");
            checkOutQuantity.value = requestQuantity;
            cartQuantity.value = requestQuantity;
            console.log(requestQuantity);
        }
    </script>
    <div class="mx-5 my-5 grid grid-cols-12 border-2 border-gray-200 rounded-2xl">
        <div class="product lg:col-span-6 col-span-12">
            <div class="productImage my-2">
                <img class="w-2/5 rounded" src="<?php echo e(asset($product->product_image), false); ?>" alt=<?php echo e("$product->product_name", false); ?>>
            </div>
            <div class="productVariations m-2 w-2/3 flex gap-2 border-2 border-blue-300 rounded py-2 px-3 bg-gray-100">
                <div class="w-12 h-12 bg-white border-2 border-green-500 hover:border-red-600 rounded-xl">
                    <img class="rounded h-full img-fluid" src="<?php echo e(asset($product->product_image), false); ?>" alt="">
                </div>
                <?php $__currentLoopData = $product->productVariation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productVariations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-12 h-12 bg-white border-2 border-green-500 hover:border-red-600 rounded-xl">
                    <img class="rounded h-full img-fluid" src="<?php echo e(asset($productVariations->product_image), false); ?>" alt="">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>     
        </div>
        <div class="lg:col-span-6 col-span-12">
            <div class="productDescription mx-5 my-2">
                <div class="py-1 productName">
                    <span class="bg-blue-500 rounded px-5 py-1 text-white font-bold text-2xl"><?php echo e($product->product_name, false); ?></span>
                </div>
                <div class="mb-2 py-1 productCategory">
                    <span class="rounded mx-2 py-1 font-semibold text-lg"> Category: <?php echo e($product->category['name'], false); ?></span>
                </div>
                <div class="flex">
                    <span class="mx-2 rounded font-semibold text-md"> Brand: <?php echo e($product->product_brand, false); ?></span>
                    <span class="mx-2 rounded font-semibold text-md"> Model: <?php echo e($product->product_model, false); ?></span>
                    <span class="mx-2 rounded font-semibold text-md"> Color: <?php echo e($product->product_color, false); ?></span>
                    <span class="mx-2 rounded font-semibold text-md"> Product Origin: <?php echo e($product->origin_country, false); ?></span>
                </div>
                <div class="mb-2 productPrice">
                    <span class="rounded mx-2 font-bold text-xl">Rs. <?php echo e($product->product_price, false); ?></span>
                </div>
                <div class="ratings flex mb-2">
                    <p class="mx-2 my-auto">Ratings: </p>
                    <div class="flex items-center">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                    </div>
                </div>
                <div class="mb-2 productDesc">
                    <span class="text-md bg-gray-200 rounded px-2 py-1"><?php echo e($product->product_description, false); ?></span>
                </div>
            </div>
            <div class="cols-span-12">
                <div class="flex">
                    <label for="requestQuantity" class="text-lg font-semibold mx-2 my-auto">Quantity: </label>
                    
                    <div>
                        <input onkeyup="inputListener()" id="requestQuantity" type="number" value="" class="border-2 border-blue-400 rounded text-md text-gray-600 font-semibold">
                        <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-red-500 font-semibold text-sm"><span><?php echo e($message, false); ?></span></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <p class="my-auto mx-2">In stock <?php echo e($product->stock, false); ?> units</p>
                </div>
            </div>
            <div class="buttons lg:col-span-5 col-span-12">
                <div class="flex">
                    <div class="buyNow my-2 mx-2">
                        <form method="POST" action="/checkout-view">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($product->id, false); ?>">
                            <input type="hidden" id="checkOutquantity" name="quantity" value="">
                            <button class="bg-green-600 border-2 rounded hover:border-green-700 text-white font-bold px-5 py-2">Buy Now</button>
                        </form>
                    </div>
                    <div class="addToCart my-2">
                        <form method="POST" action="/add-to-cart">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($product->id, false); ?>">
                            <input type="hidden" id="cartquantity" name="quantity" value="">
                            <button class="bg-green-600 border-2 rounded hover:border-green-700 text-white font-bold px-5 py-2">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('User.Layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\resources\views/User/productDetails.blade.php ENDPATH**/ ?>