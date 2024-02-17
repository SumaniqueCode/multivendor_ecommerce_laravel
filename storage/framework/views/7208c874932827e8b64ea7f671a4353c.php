
<?php $__env->startSection('content'); ?>
<script>
 function inputListener(){
    var productData = JSON.parse(document.getElementById("productData").value);
    let requestedQuantity = document.getElementById("requestedQuantity").value;
    stockExceedError = document.getElementById("stockExceedError");
    stockExceedError.innerHTML = "";
    if (requestedQuantity > productData.stock) {
      stockExceedError.innerHTML = "Quantity Exceed the product in stock";
    }
    document.getElementById("orderTotalQuantity").innerHTML = requestedQuantity;
    document.getElementById("orderTotalPrice").innerHTML = "Rs. " + requestedQuantity * productData.product_price;
    console.log(productData);
  };
</script>

<div class="mx-5">
  <div class="grid grid-cols-12">
    <div class="col-span-12">
      <?php if(session('success')): ?>
      <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white"><span><?php echo e(session('success'), false); ?></span></div>
      <?php endif; ?>
    </div>
    <div class="col-span-12">
      <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="text-white text-center p-3 mt-2 font-semibold text-lg bg-red-600 border rounded-lg"><span><?php echo e($message, false); ?></span></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div id="cartdesc" class="cartdesc h-max border-4 border-gray-500 rounded-xl bg-white col-span-12 lg:col-span-8 m-2">
      <div class="bg-indigo-500 text-white font-bold p-2 flex justify-center border rounded-2xl">
        <h3 class="mx-auto">ORDER DETAILS</h3>
      </div>
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
                  <input type="hidden" id="productData" value="<?php echo e($product, false); ?>">
                    <label for="requestQuantity" class="text-lg font-semibold mx-2 my-auto">Quantity: </label>
                    
                      <input onkeyup="inputListener()" id="requestedQuantity" type="number" value="<?php echo e($quantity, false); ?>" class="border-2 border-blue-400 rounded text-md text-gray-600 font-semibold">
                    
                    <p class="my-auto mx-2">In stock <?php echo e($product->stock, false); ?> units</p>
                </div>
                <p id="stockExceedError" class="text-red-500 text-center me-20"></p>
            </div>
        </div>
    </div>
    </div>
    <div id="cartSummary" class=" h-max cartdesc border-4 border-gray-500 rounded-xl bg-white col-span-12 lg:col-span-4 m-2">
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
                 <input class="border rounded" type="hidden" name="id" value="<?php echo e($product->id, false); ?>">
                <div class="relative">
                 <input class="w-72 pl-2 border rounded-xl" type="text" id="discount_voucher" name="discount_voucher" value="">
                 <a class="absolute inset-y-0 right-0 my-auto" href="/add-discount-voucher">
                   <button class="px-2 py-1 mt-1 me-0.5 pt-0.5 bg-green-500 text-white font-semibold rounded-lg">Apply</button>
                 </a>
               </div>
              </form>
            </td>
          </tr>
          <tr class="border-b-2 border-gray-500 border-t-2">
            <td colspan="" class="">Total Item:</td>
            <td class="text-center">
             1
            </td>
            </tr>
            <tr class="border-b-2 border-gray-500 border-t-2">
              <td colspan="" class="">Total Quantity:</td>
              <td id="orderTotalQuantity" class="text-center">
                <?php echo e($quantity, false); ?>

              </td>
              </tr>
          <tr class="border-b-2 border-gray-500 border-t-2">
            <td>Total Price: </td>
            <td id="orderTotalPrice" class="text-center">
              <?php
              echo $product->product_price * $quantity;
              ?>
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
            <input class="my-auto border-2 h-5 w-5" id="payment_method" type="radio" name="payment_method" value="Khalti"/>
            <img src="<?php echo e(asset('Images/System/khalti.png'), false); ?>" alt="Khalti Logo" class="mx-2 w-32 h-12 rounded bg-white shadow mr-2">
          </div>
          <div class="flex mx-auto">
            <input class="my-auto border-2 h-5 w-5" id="payment_method" type="radio" name="payment_method" value="COD"/>
            <img src="<?php echo e(asset('Images/System/COD.png'), false); ?>" alt="COD" class="mx-2 w-24 h-12 rounded bg-white shadow mr-2"/>
          </div>
        </div>
      </div>
      <div class="mt-2 col-span-12 ms-auto">
        <input type="hidden" name="cart_ids" id="selectedCartIdsInput" value="">
        <input type="hidden" class="" name="status" value="pending">
        <input type="hidden" class="" name="payment_status" value="unpaid">
          <button type="submit" id="checkoutBtn" class="w-full hover:bg-green-600 bg-green-700 border rounded-lg p-2 text-white text-lg font-bold">CHECK OUT</button>
      </div>
    </form>
    </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('User.Layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\resources\views/User/checkout.blade.php ENDPATH**/ ?>