<div <?php echo $attributes; ?>>
    <?php if($title || $tools): ?>
        <div class="card-header with-border">
            <h3 class="card-title"><?php echo e($title, false); ?></h3>
            <div class="card-tools pull-right">
                <?php $__currentLoopData = $tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $tool; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
    <?php endif; ?>
    <div id="<?php echo e($id, false); ?>-body" class="card-body collapse show">
        <?php echo $content; ?>

    </div><!-- /.box-body -->
    <?php if($footer): ?>
        <div class="card-footer">
            <div class="row">
            <?php echo $footer; ?>

            </div>
        </div><!-- /.box-footer-->
    <?php endif; ?>
</div>
<script>
    <?php echo $script; ?>

</script><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/widgets/box.blade.php ENDPATH**/ ?>