<?php if(!empty($inline)): ?>
<div class="col-auto">
<?php else: ?>
<?php if(!empty($showAsSection)): ?>
    <div class="row has-many-head">
        <h4><?php echo e($label, false); ?></h4>
    </div>
    <hr class="form-border">
<?php endif; ?>

<div class="<?php echo e($viewClass['form-group'], false); ?> <?php echo !$errors->has($errorKey) ? '' : 'has-error'; ?>">
    <label for="<?php echo e($id, false); ?>" class="<?php echo e($viewClass['label'], false); ?> form-label"><?php if(empty($showAsSection)): ?><?php echo e($label, false); ?><?php endif; ?></label>
    <div class="<?php echo e($viewClass['field'], false); ?>">
        <?php echo $__env->make('admin::form.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/form/_header.blade.php ENDPATH**/ ?>