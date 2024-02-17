<?php echo $__env->make("admin::form._header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="input-group">

            <?php if($prepend): ?>
            <span class="input-group-text with-icon"><?php echo $prepend; ?></span>
            <?php endif; ?>

            <input <?php echo $attributes; ?> />

            <?php if($append): ?>
                <span class="input-group-text clearfix"><?php echo $append; ?></span>
            <?php endif; ?>

            <?php if(isset($btn)): ?>
                <span class="input-group-btn">
                  <?php echo $btn; ?>

                </span>
            <?php endif; ?>

        </div>

<?php echo $__env->make("admin::form._footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/form/input.blade.php ENDPATH**/ ?>