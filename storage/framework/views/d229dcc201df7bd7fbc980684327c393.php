<div class="input-group">

    <?php if($group): ?>
    <div class="input-group-btn">
        <input type="hidden" name="<?php echo e($id, false); ?>_group" class="<?php echo e($group_name, false); ?>-operation" value="0"/>
        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" style="min-width: 32px;">
            <span class="<?php echo e($group_name, false); ?>-label"><?php echo e($default['label'], false); ?></span>

        </button>
        <ul class="dropdown-menu <?php echo e($group_name, false); ?>">
            <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a class="dropdown-item" href="#" data-index="<?php echo e($index, false); ?>"> <?php echo e($item['label'], false); ?> </a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
        <div class="input-group-text with-icon">
            <i class="icon-<?php echo e($icon, false); ?>"></i>
        </div>

    <input type="<?php echo e($type, false); ?>" class="form-control <?php echo e($id, false); ?>" placeholder="<?php echo e($placeholder, false); ?>" name="<?php echo e($name, false); ?>" value="<?php echo e(request($name, $value), false); ?>">
</div><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/filter/text.blade.php ENDPATH**/ ?>