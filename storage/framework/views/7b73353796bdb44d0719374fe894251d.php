<?php if(!$holdAll): ?>
    <div class="btn-group <?php echo e($all, false); ?>-holder show-on-rows-selected d-none me-1">
    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="selected hidden-xs" data="<?php echo e(trans('admin.grid_items_selected'), false); ?>"></span>
      <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <?php if(!$actions->isEmpty()): ?>
    <ul class="dropdown-menu" role="menu">
        <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo $action->render(); ?></li>

            <?php if($action instanceof \OpenAdmin\Admin\Actions\BatchAction): ?>

            <?php elseif(1==2): ?>
                <li><a href="#" class="<?php echo e($action->getElementClass(false), false); ?> dropdown-item"><i class="<?php echo e($action->icon, false); ?>"></i><?php echo $action->render(); ?> </a></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php endif; ?>
  </div>
<?php endif; ?><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/grid/batch-actions.blade.php ENDPATH**/ ?>