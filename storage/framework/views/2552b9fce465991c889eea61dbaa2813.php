<?php echo $__env->make("admin::form._header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="input-group">
        <button type="button" id="<?php echo e($id, false); ?>-button-min" class="input-group-text btn btn-light minus with-icon"><i class="icon-minus"></i></button>
        <input <?php echo $attributes; ?> />
        <button type="button" id="<?php echo e($id, false); ?>-button-plus" class="input-group-text btn btn-light plus with-icon"><i class="icon-plus"></i></button>
    </div>

<?php echo $__env->make("admin::form._footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/form/number.blade.php ENDPATH**/ ?>