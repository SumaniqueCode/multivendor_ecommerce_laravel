<div class="dropdown btn-group grid-column-selector dropdown" id="grid-column-selector" data-defaults='<?php echo e(implode(",",$defaults), false); ?>'>
    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="icon-table"></i>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">

        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        if (empty($visible)) {
            $checked = 'checked';
        } else {
            $checked = in_array($key, $visible) ? 'checked' : '';
        }
        ?>

        <li>
            <label class="dropdown-item" for="column-select-<?php echo e($key, false); ?>">
                <input type="checkbox" class="form-check-input column-selector" id="column-select-<?php echo e($key, false); ?>" value="<?php echo e($key, false); ?>" <?php echo e($checked, false); ?>/><?php echo e($label, false); ?>

            </label>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <li><hr class="dropdown-divider"></li>
        <li class="text-right">
            <button class="btn btn-sm btn-light column-select-all" onclick="admin.grid.columns.all()"><?php echo e(__('admin.all'), false); ?></button>&nbsp;&nbsp;
            <button class="btn btn-sm btn-primary column-select-submit" onclick="admin.grid.columns.submit()"><?php echo e(__('admin.submit'), false); ?></button>
        </li>
    </ul>
</div><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/components/column-selector.blade.php ENDPATH**/ ?>