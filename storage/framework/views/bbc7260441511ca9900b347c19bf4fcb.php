<?php if(is_array($errorKey)): ?>

    <?php $__currentLoopData = $errorKey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($errors->has($col.$key)): ?>
        <div class="alert alert-danger">
            <ul class="m-0">
            <?php $__currentLoopData = $errors->get($col.$key); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li for="inputError"> <?php echo e($message, false); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>

    <?php if($errors->has($errorKey)): ?>
        <div class="alert alert-danger">
            <ul class="m-0 ps-3">
            <?php $__currentLoopData = $errors->get($errorKey); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li for="inputError"> <?php echo e($message, false); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

<?php endif; ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/form/error.blade.php ENDPATH**/ ?>