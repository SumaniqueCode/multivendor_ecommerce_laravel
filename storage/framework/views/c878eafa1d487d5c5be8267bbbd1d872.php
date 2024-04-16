
<?php $__env->startSection('content'); ?>

<div class="">
    <div class="form my-8 grid grid-cols-12">
        <?php if(session('success')): ?>
        <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white"><span><?php echo e(session('success'), false); ?></span></div>
        <?php endif; ?>
        <div class="col-span-12">
            <form class="max-w-6xl mx-auto mx-2 border-2 border-green-400 p-4 rounded-2xl" method="post" action="/create-new-address" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <legend class="font-bold text-center text-2xl mb-5">ADD YOUR DELIVERY ADDRESS DETAILS</legend>
                <div class="grid grid-cols-12">
                    <div class="mb-5 full_name mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Full Name<span class="text-red-500">*</span></label>
                        <input type="text" id="full_name" name="full_name" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your full Name" required>
                        <?php $__errorArgs = ['full_name'];
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
                    <div class="mb-5 delivery_point mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="delivery_point" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Delivery Point<span class="text-red-500">*</span></label>
                        <select id="delivery_point" name="delivery_point" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['delivery_point'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option id="" name="delivery_point" value="" class="">Select Pickup Points</option>
                            <option id="" name="" value="Itahari" class="">Itahari</option>
                            <option id="" name="" value="Dharan" class="">Dharan</option>
                            <option id="" name="" value="Biratnagar" class="">Biratnagar</option>
                            <option id="" name="" value="Belbari" class="">Belbari</option>
                            <option id="" name="" value="Urlabari" class="">Urlabari</option>
                            <option id="" name="" value="Damak" class="">Damak</option>
                            <option id="" name="" value="Inaruwa" class="">Inaruwa</option>
                            <option id="" name="" value="Katmandu" class="">Katmandu</option>
                            <option id="" name="" value="Chitwan" class="">Chitwan</option>
                            <option id="" name="" value="Pokhara" class="">Pokhara</option>
                        </select>
                        <?php $__errorArgs = ['delivery_point'];
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
                    <div class="mb-5 phone mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="phone" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number<span class="text-red-500">*</span></label>
                        <input type="phone" id="phone" name="phone" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Eg: +977 98XXXXXXXX" required>
                        <?php $__errorArgs = ['phone'];
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
                    <div class="mb-5 addressBox mx-1 col-span-12 sm:col-span-6 md:col-span-4 row-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">User Address<span class="text-red-500">*</span></label>
                        <input type="text" id="address" name="address" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your Address" required></input>
                        <?php $__errorArgs = ['address'];
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
                    <div class="mb-5 landmarkBox mx-1 col-span-12 sm:col-span-6 md:col-span-4">
                        <label for="landmark" class=" text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Landmark</label>
                        <input type="text" id="landmark" name="landmark" class="bg-blue-50 border border-blue-300 text-blue-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Eg: Dharahara" >
                        <?php $__errorArgs = ['landmark'];
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
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/User/addDeliveryDetails.blade.php ENDPATH**/ ?>