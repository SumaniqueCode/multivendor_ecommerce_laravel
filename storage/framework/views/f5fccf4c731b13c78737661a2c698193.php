<div class="card border-<?php echo e($style, false); ?>" <?php if($style!= 'none'): ?>style="border-top:2px solid;" <?php endif; ?>>
    <div class="card-header with-border">
        <h3 class="card-title"><?php echo e($title, false); ?></h3>

        <div class="card-tools">
            <?php echo $tools; ?>

        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="form-horizontal">

        <div class="card-body">

            <div class="row">

                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $field->render(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
        <!-- /.box-body -->
    </div>
</div><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/show/panel.blade.php ENDPATH**/ ?>