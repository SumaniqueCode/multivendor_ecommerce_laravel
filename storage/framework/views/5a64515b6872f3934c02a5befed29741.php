<div class="btn-group " style="margin-right: 5px">
    <label class="btn btn-sm btn-primary btn-filter <?php echo e($btn_class, false); ?> <?php echo e($expand ? '' : 'collapsed', false); ?>" title="<?php echo e(trans('admin.filter'), false); ?>" data-bs-toggle="collapse" href="#<?php echo e($filter_id, false); ?>" role="button" aria-expanded="false" aria-controls="<?php echo e($filter_id, false); ?>">
        <i class="icon-filter"></i><span class="hidden-xs">&nbsp;&nbsp;<?php echo e(trans('admin.filter'), false); ?></span><?php if($scopes->isEmpty()): ?><i class="icon-angle-down"></i><?php endif; ?><i class="icon-angle-up"></i>
    </label>

    <?php if($scopes->isNotEmpty()): ?>

    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span><?php echo e($label, false); ?></span>
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <?php $__currentLoopData = $scopes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scope): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $scope->render(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="<?php echo e($cancel, false); ?>"><?php echo e(trans('admin.cancel'), false); ?></a></li>
    </ul>

    <?php endif; ?>

</div><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/filter/button.blade.php ENDPATH**/ ?>