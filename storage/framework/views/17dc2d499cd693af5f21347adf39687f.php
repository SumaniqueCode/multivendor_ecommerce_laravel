

<?php $__env->startSection('content'); ?>

<div class="mx-5">
    <div>
        <div class="my-8">
            <div class="max-w-sm mx-auto border-2 border-green-400 p-4 rounded-2xl py-8">
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
                    <h3 class="text-base font-medium text-left">Email: <?php echo e(auth()->user()->email, false); ?></h3>
                </div>
                <div class="mb-5">
                    <h3 class="text-base font-medium text-left">Phone: <?php echo e(auth()->user()->phone, false); ?></h3>
                </div>
            </div>
            <div class="top-2/3 left-2/3 absolute">
               <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo e(route('logout'), false); ?>"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                   <button class="font-medium bg-red-600 border rounded text-white px-2 py-1"> <?php echo e(__('LOGOUT'), false); ?></button>
                </a>

                <form id="logout-form" action="<?php echo e(route('logout'), false); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('User.Layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\resources\views/User/profile.blade.php ENDPATH**/ ?>