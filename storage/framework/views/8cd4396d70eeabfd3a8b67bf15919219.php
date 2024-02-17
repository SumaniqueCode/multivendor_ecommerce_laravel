
<footer class="navbar form-footer navbar-light bg-white py-3 px-4 <?php if(!empty($fixedFooter)): ?>shadow fixed-bottom <?php endif; ?>">
    <div class="row">
    <?php echo e(csrf_field(), false); ?>


    <div class="col-md-<?php echo e($width['label'], false); ?>">
    </div>

    <div class="col-md-<?php echo e($width['field'], false); ?> d-flex align-items-center ">
        <?php if(in_array('reset', $buttons)): ?>
        <div class="flex-grow-1 ">
            <button type="reset" class="btn btn-warning"><?php echo e(trans('admin.reset'), false); ?></button>
        </div>
        <?php endif; ?>

        <?php if(in_array('submit', $buttons)): ?>

        <div class="btn-group">
        <?php $__currentLoopData = $submit_redirects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $redirect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(in_array($redirect, $checkboxes)): ?>
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input after-submit" id="after-save-<?php echo e($redirect, false); ?>" name="after-save" value="<?php echo e($value, false); ?>" <?php echo e(($default_check == $redirect) ? 'checked' : '', false); ?>>
                <label class="form-check-label" for="after-save-<?php echo e($redirect, false); ?>"><?php echo e(trans("admin.{$redirect}"), false); ?></label>
            </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary"><?php echo e(trans('admin.submit'), false); ?></button>
        </div>

        <?php endif; ?>


    </div>
</div>
</footer><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/form/footer.blade.php ENDPATH**/ ?>