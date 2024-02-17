
<?php $__env->startSection('content'); ?>
<script>
    $(document).ready(function(){
        $(".editCard").hide();
        $('.dottedBtn').click(function() {
            // Find the closest editCard within the same parent container
            $(this).closest('.product-variation-container').find('.editCard').toggle();
        });
    })
</script>


<div class="">
    <?php if(session('success')): ?>
    <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white"><span><?php echo e(session('success'), false); ?></span></div>
    <?php endif; ?>
    <div class="my-8 grid grid-cols-12 mx-2">
        <div class="col-span-12 lg:col-span-8 mx-2  border-4 rounded-xl border-gray-400 mb-3">
            <h2 class="font-bold mx-2 text-center text-2xl col-span-12">PRODUCTS DETAILS</h2>
            <div class="">
                <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400 border-separate border-spacing-2">
                    <tbody>
                        <tr class="row" scope="row">
                            
                            <th class="col text-left font-semibold uppercase" scope="col">Product Name : <?php echo e($product->name, false); ?></th>
                            <th class="col text-left font-semibold uppercase">Category : <?php echo e($product->category['name'], false); ?></th>
                            <th class="col text-left font-semibold uppercase">Status : <?php echo e($product->status, false); ?></th>
                        </tr>
                        
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Brand : <?php echo e($product->brand, false); ?></th>
                            <th class="col text-left font-semibold uppercase">Model : <?php echo e($product->model, false); ?></th>
                            <th class="col text-left font-semibold uppercase">Origin : <?php echo e($product->origin, false); ?></th>
                        </tr>
                        <tr class="row">
                            <th class="col text-left font-semibold uppercase">Description : </th>
                            <td class="col">
                                <?php if(strlen($product->description) > 1000): ?>
                                <?php echo e(Illuminate\Support\Str::limit($product->description, $limit = 1000, $end = '...'), false); ?>

                                <?php else: ?>
                                <?php echo e($product->description, false); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="row text-center">
                            <th class="col" colspan="3">
                                <a href="/product/edit-product/<?php echo e($product->id, false); ?>"><button id="editBtn" class="bg-blue-700 hover:bg-blue-600 text-white py-2 px-3 mb-3 rounded-lg shadow-md">Edit Product</button></a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="">
                <?php $__currentLoopData = $product->productVariation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productVariation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-variation-container border-t-4 border-gray-400 rounded-3xl">
                    <div class="flex justify-center">
                        <h2 class=" ms-auto text-center font-bold text-2xl mt-2">Variation: <?php echo e($productVariation->id, false); ?></h2>
                        <button id="dottedBtn" class="dottedBtn text-xl ms-auto mx-4 mt-4 bg-gray-100 hover:bg-gray-300 font-bold border rounded text-center px-2 text-blue-800">•••</button> 
                    </div>
                    <div class="relative w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <div class="flex">
                            <?php $__currentLoopData = json_decode($productVariation->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img  class="img-fluid w-32 mx-auto" src="<?php echo e(asset($productImage), false); ?>" alt="<?php echo e($productVariation->product['name'], false); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="flex justify-between mx-5 my-2">
                            <p class="col text-left font-semibold uppercase">Price (In NRs.) : Rs. <?php echo e(number_format($productVariation->price, 2), false); ?></p>
                            <p class="col text-left font-semibold uppercase">Stock Quantity : <?php echo e($productVariation->stock, false); ?> items</p>
                            <p class="col text-left font-semibold uppercase">Color : <?php echo e($productVariation->color, false); ?></p>
                            <p class="col text-left font-semibold uppercase">Size : <?php echo e($productVariation->size, false); ?></p>
                        </div>
                        <div id="editCard" class="editCard absolute right-5 top-1 flex flex-col bg-white border py-3 px-2 w-1/5 rounded-lg shadow-lg border border-2 border-gray-400">
                            <a href="/product/edit-product-variation/<?php echo e($productVariation->id, false); ?>" class="text-black font-semibold mb-1 bg-gray-300 hover:bg-blue-700 hover:text-white rounded-lg text-md w-full sm:w-auto px-8 py-2 text-center">Edit</a>
                            <a href="/product/product/delete-product-variation/<?php echo e($productVariation->id, false); ?>" class="text-black font-semibold bg-gray-300 hover:bg-red-700 hover:text-white rounded-lg text-md w-full sm:w-auto px-max py-2 text-center">Delete</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="variations col-span-12 lg:col-span-4 mx-2">
            
            <div class="col-span-12 mb-3">
                    <form class="max-w-6xl mx-auto border-2 border-green-400 p-4 rounded-2xl" method="post" action="/product/add-product-variation" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <legend class="font-bold text-center text-2xl mb-5">ADD PRODUCT VARIATION</legend>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id, false); ?>">
                        <div class="grid grid-cols-12">
                            <div class="mb-5 price mx-1 col-span-12 col-span-6">
                                <label for="price" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price <span class="text-red-500">*</span></label>
                                <input type="text" id="price" name="price" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter the price here" required>
                                <?php $__errorArgs = ['price'];
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
                                <label for="stock" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product in Stock <span class="text-red-500">*</span></label>
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
                            <div class="mb-5 product_color mx-1 col-span-12 col-span-6">
                                <label for="color" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Color</label>
                                <input type="text" id="color" name="color" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Eg: red" >
                                <?php $__errorArgs = ['color'];
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
                            <div class="mb-5 size mx-1 col-span-12 md:col-span-6">
                                <label for="size" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Size</label>
                                <input type="text" id="size" name="size" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Dimension or size" >
                                <?php $__errorArgs = ['size'];
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
                            <div class="mb-5 iamge mx-1 col-span-12">
                                <label for="image" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Image <span class="text-red-500">*</span></label>
                                <input type="file" id="image" name="image" multiple accept="image/*" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-red-500 text-sm"><span><?php echo e($message, false); ?></span></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <script>
                                    $documen. ready(function(){
                                        $(#image)
                                        var img = document.getElementById("image").value;
                                        console.log(img);
                                    })
                                    </script>
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
<?php echo $__env->make('Seller.Layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/Seller/viewProduct.blade.php ENDPATH**/ ?>