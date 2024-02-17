
<?php $__env->startSection('content'); ?>

<div class="">
    <?php if(session('success')): ?>
    <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white"><span><?php echo e(session('success'), false); ?></span></div>
    <?php endif; ?>
    <div class="my-8 grid grid-cols-12">
        <div class="col-span-12 lg:col-span-8 mx-2  border-4 rounded-xl border-gray-400 mb-3">
            <h2 class="font-bold text-center text-2xl mb-5 col-span-12">PRODUCTS DETAILS</h2>
            <div class="">
                <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400 border-separate border-spacing-2">
                    <tbody>
                        <tr class="row" scope="row">
                            <td colspan="2" rowspan="4">
                                <img src="<?php echo e(asset($product->product_image), false); ?>" alt="<?php echo e($product->product_name, false); ?>" class="img-fluid w-80">
                            </td>
                            <th class="col text-left font-semibold uppercase" scope="col">Product Name : <?php echo e($product->product_name, false); ?></th>
                            <th class="col text-left font-semibold uppercase">Category : <?php echo e($product->category['name'], false); ?></th>
                        </tr>
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Price (In NRs.) : Rs. <?php echo e(number_format($product->product_price, 2), false); ?></th>
                            <th class="col text-left font-semibold uppercase">Stock Quantity : <?php echo e($product->stock, false); ?> items</th>                        </tr>
                        <tr>
                            <th class="col text-left font-semibold uppercase">Color : <?php echo e($product->product_color, false); ?></th>
                            <th class="col text-left font-semibold uppercase">Origin : <?php echo e($product->origin_country, false); ?></th>
                        </tr>
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Brand : <?php echo e($product->product_brand, false); ?></th>
                            <th class="col text-left font-semibold uppercase">Model : <?php echo e($product->model, false); ?></th>
                            <th class="col text-left font-semibold uppercase"></th>
                        </tr>
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Description : </th>
                            <td class="col" colspan="5">
                                <?php if(strlen($product->product_description) > 1000): ?>
                                <?php echo e(Illuminate\Support\Str::limit($product->product_description, $limit = 1000, $end = '...'), false); ?>

                                <?php else: ?>
                                <?php echo e($product->product_description, false); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="row text-center">
                            <th class="col" colspan="6">
                                <a href="/product/edit-product/<?php echo e($product->id, false); ?>"><button id="editBtn" class="bg-blue-700 hover:bg-blue-600 text-white py-2 px-3 mb-3 rounded-lg shadow-md">Edit Product</button></a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="">
                <?php $__currentLoopData = $productVariations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productVariation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border-t-4 border-gray-400 rounded-3xl">
                <h2 class="text-center font-bold text-xl mt-2">Variation: <?php echo e($productVariation->id, false); ?></h2>
                    <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="row" scope="row">
                                <td colspan="2" rowspan="3">
                                    <img  class="img-fluid w-32 mx-auto" src="<?php echo e(asset($productVariation->product_image), false); ?>" alt="<?php echo e($productVariation->product['name'], false); ?>">
                                </td>
                            </tr>
                            <tr class="row">
                                <th class="col text-left font-semibold uppercase">Price (In NRs.) : Rs. <?php echo e(number_format($productVariation->product_price, 2), false); ?></th>
                                <th class="col text-left font-semibold uppercase">Color : <?php echo e($productVariation->product_color, false); ?></th>
                            </tr>
                            <tr>
                                <th class="col text-left font-semibold uppercase">Stock Quantity : <?php echo e($productVariation->stock, false); ?> items</th>
                            </tr>
                            <tr class="row text-center">
                                <th class="col" colspan="6">
                                    <a href="/product-variation/edit-product/<?php echo e($productVariation->id, false); ?>"><button id="editBtn" class="bg-blue-700 hover:bg-blue-600 text-white py-2 px-3 mb-3 rounded-lg shadow-md">Edit Product Variation</button></a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="product_variations col-span-12 lg:col-span-4 mx-2">
            
            <div class="col-span-12 mb-3">
                    <form class="max-w-6xl mx-auto border-2 border-green-400 p-4 rounded-2xl" method="post" action="/product/add-product-variation" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <legend class="font-bold text-center text-2xl mb-5">ADD PRODUCT VARIATION</legend>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id, false); ?>">
                        <div class="grid grid-cols-12">
                            <div class="mb-5 price mx-1 col-span-12 col-span-6">
                                <label for="product_price" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
                                <input type="text" id="product_price" name="product_price" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['product_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter the price here" required>
                                <?php $__errorArgs = ['product_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-500 text-sm"><span><?php echo e($message, false); ?></span></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-5 color mx-1 col-span-12 col-span-6">
                                <label for="product_color" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Color</label>
                                <input type="text" id="product_color" name="product_color" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['product_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Eg: red" required>
                                <?php $__errorArgs = ['product_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-500 text-sm"><span><?php echo e($message, false); ?></span></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-5 mx-1 col-span-12 col-span-6">
                                <label for="stock" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product in Stock</label>
                                <input type="number" id="stock" name="stock" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter number of stocks" required>
                                <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-500 text-sm"><span><?php echo e($message, false); ?></span></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-5 iamge mx-1 col-span-12 col-span-6">
                                <label for="product_image" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Image</label>
                                <input type="file" id="product_image" name="product_image" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-500 text-sm"><span><?php echo e($message, false); ?></span></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-5 col-span-12 mx-auto">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-8 mt-5 py-2.5 text-center">SUBMIT</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Seller.Layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\resources\views/Seller/viewProduct.blade.php ENDPATH**/ ?>