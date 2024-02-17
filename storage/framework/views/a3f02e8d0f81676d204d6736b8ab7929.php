
<?php $__env->startSection('content'); ?>

<div class="">
    <?php if(session('success')): ?>
    <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white"><span><?php echo e(session('success'), false); ?></span></div>
    <?php endif; ?>
    <div class="form my-8 grid grid-cols-12">
        <div class="col-span-12">
            <form class="max-w-6xl mx-auto mx-2 border-2 border-green-400 p-4 rounded-2xl" method="post" action="/add-category" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <legend class="font-bold text-center text-2xl mb-5">ADD CATEGORIES</legend>
                <div class="grid grid-cols-12">
                    <div class="mb-5 name mx-1 col-span-12 flex justify-center">
                        <label for="name" class="max-w-md my-auto block mb-2 mx-2 text-sm font-medium text-gray-900 dark:text-white">Category Name: </label>
                        <input type="text" id="name" name="name" class="my-auto max-w-md bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Category Name" required>
                        <?php $__errorArgs = ['name'];
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
<?php echo $__env->make('Seller.Layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\resources\views/Seller/category.blade.php ENDPATH**/ ?>