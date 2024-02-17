<div class="card box-info">
    <div class="card-header with-border">
        <h3 class="card-title"><?php echo e($form->title(), false); ?></h3>

        <div class="card-tools">
            <?php echo $form->renderTools(); ?>

        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php echo $form->open(); ?>


    <div class="card-body p-0">

        <?php if(!$tabObj->isEmpty()): ?>
            <?php echo $__env->make('admin::form.tab', compact('tabObj'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <div class="row fields-group">

                <?php if($form->hasRows()): ?>
                    <?php $__currentLoopData = $form->getRows(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $row->render(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php $__currentLoopData = $layout->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-<?php echo e($column->width(), false); ?>">
                            <?php $__currentLoopData = $column->fields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $field->render(); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
    <!-- /.box-body -->

    <?php echo $form->renderFooter(); ?>


    <?php $__currentLoopData = $form->getHiddenFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $field->render(); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- /.box-footer -->
    <?php echo $form->close(); ?>


</div>
<?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/form.blade.php ENDPATH**/ ?>