<?php if(Auth()->user()->role == "User"): ?>

<?php else: ?>
    
<?php endif; ?>

<?php $__env->startSection('content'); ?>

<div class="mx-5 my-8 grid grid-cols-12">
        <div class="col-span-8">
            <div class="max-w-md ms-auto border-2 border-green-400 p-4 rounded-2xl py-8">
                <div class="mb-5 flex justify-center">
                    <img src="<?php echo e(asset(auth()->user()->profile_image), false); ?>"  class=" border-2 border-blue-500 rounded w-24 h-24"/>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Name: <?php echo e(auth()->user()->name, false); ?></h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Address: <?php echo e(auth()->user()->address, false); ?></h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Gender: <?php echo e(auth()->user()->gender, false); ?></h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">DOB: <?php
                        $date_of_birth = auth()->user()->date_of_birth;
                        $timestamp = strtotime($date_of_birth);
                        $formatted_date = date("F d, Y", $timestamp);
                        echo $formatted_date; ?>
                        </h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Email: <?php echo e(auth()->user()->email, false); ?></h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Phone: <?php echo e(auth()->user()->phone, false); ?></h3>
                </div>
            </div>
        </div>
        <div class="col-span-4 my-2 mx-2">
            <div class="top-1/4 left-2/3 my-2">
                <a href="/edit-user"><button class="bg-blue-700 text-white rounded p-1 px-12 font-medium">Edit</button></a>
            </div>
            <div class="top-2/3 left-2/3 my-2">
               
                <a class="" href="<?php echo e(route('logout'), false); ?>"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                   <button class="font-medium bg-red-600 border rounded text-white px-8 py-1"> <?php echo e(__('LOGOUT'), false); ?></button>
                </a>
                <form id="logout-form" action="<?php echo e(route('logout'), false); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('User.Layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/User/profile.blade.php ENDPATH**/ ?>