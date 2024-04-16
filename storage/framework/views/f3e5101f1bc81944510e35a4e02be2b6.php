
<?php $__env->startSection('content'); ?>

<div class="">
    <div class="form my-8 grid grid-cols-12">
        <div class="col-span-12 mb-3">
            <form class="max-w-6xl mx-auto border-2 border-green-400 p-4 rounded-2xl" method="post" action="/product/update-product-variation/<?php echo e($productVariation->id, false); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <legend class="font-bold text-center text-2xl mb-5">Edit PRODUCT VARIATION</legend>
                <div class="py-1 productName">
                    <span
                        class="bg-blue-500 rounded px-5 py-1 text-white font-bold text-2xl"><?php echo e($productVariation->product->name, false); ?> Variarion: <?php echo e($productVariation->id, false); ?></span>
                </div>
                <input value="<?php echo e($productVariation, false); ?>" type="hidden" name="product_id" value="<?php echo e($productVariation->product->id, false); ?>">
                <div class="grid grid-cols-12 mt-2">
                    <div class="mb-5 price mx-1 col-span-12 col-span-6">
                        <label for="price" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price <span class="text-red-500">*</span></label>
                        <input value="<?php echo e($productVariation->price, false); ?>" type="text" id="price" name="price" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['price'];
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
                        <input value="<?php echo e($productVariation->stock, false); ?>" type="number" id="stock" name="stock" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['stock'];
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
                        <input value="<?php echo e($productVariation->color, false); ?>" type="text" id="color" name="color" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['color'];
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
                        <input value="<?php echo e($productVariation->size, false); ?>" type="text" id="size" name="size" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['size'];
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
                        <input value="<?php echo e($productVariation->image, false); ?>" type="file" id="image" name="image" multiple accept="image/*" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['image'];
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
                    </div>
                    <div class="mb-5 col-span-12 mx-auto">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-8 mt-5 py-2.5 text-center">SUBMIT</button>
                    </div>
                </div>
            </form>
    </div>
      </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/Seller/editProductVariation.blade.php ENDPATH**/ ?>