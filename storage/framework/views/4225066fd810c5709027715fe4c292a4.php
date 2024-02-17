<li class="dd-item" data-id="<?php echo e($branch[$keyName], false); ?>">
    <div class="dd-handle">
        <?php echo $branchCallback($branch); ?>

        <span class="pull-right dd-nodrag">
            <a href="<?php echo e(url("$path/$branch[$keyName]/edit"), false); ?>"><i class="icon-edit"></i></a>
            <a onclick="admin.tree.delete(<?php echo e($branch[$keyName], false); ?>)" data-id="<?php echo e($branch[$keyName], false); ?>" class="tree_branch_delete"><i class="icon-trash"></i></a>
        </span>
    </div>
    <?php if(isset($branch['children'])): ?>
    <ol class="dd-list">
        <?php $__currentLoopData = $branch['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make($branchView, $branch, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
    <?php endif; ?>
</li><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/tree/branch.blade.php ENDPATH**/ ?>