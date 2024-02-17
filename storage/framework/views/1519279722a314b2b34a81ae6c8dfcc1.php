<div class="row ">
    <label class="col-sm-<?php echo e($width['label'], false); ?> form-label"><?php echo e($label, false); ?></label>
    <div class="col-sm-<?php echo e($width['field'], false); ?> show-value">
        <?php if($wrapped): ?>
        <div class="card">
            <!-- /.box-header -->
            <div class="card-body">
                <?php if($escape): ?>
                    <?php echo e($content, false); ?>&nbsp;
                <?php else: ?>
                    <?php echo $content; ?>&nbsp;
                <?php endif; ?>
            </div><!-- /.box-body -->
        </div>
        <?php else: ?>
            <?php if($escape): ?>
                <?php echo e($content, false); ?>

            <?php else: ?>
                <?php echo $content; ?>

            <?php endif; ?>
        <?php endif; ?>
    </div>
</div><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/show/field.blade.php ENDPATH**/ ?>