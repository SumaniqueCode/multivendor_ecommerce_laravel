<div class="with-border collapse <?php echo e($expand?'show':'', false); ?> filter-box" id="<?php echo e($filterID, false); ?>">
    <form action="<?php echo $action; ?>" class="form pt-0 form-horizontal" pjax-container method="get" autocomplete="off">

        <div class="row mb-0">
            <?php $__currentLoopData = $layout->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-<?php echo e($column->width(), false); ?>">
                <div class="card-body">
                    <div class="fields-group">
                        <?php $__currentLoopData = $column->filters(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $filter->render(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- /.box-body -->

        <div class="card-footer">
            <div class="row">
                <div class="col-md-<?php echo e($layout->columns()->first()->width(), false); ?>">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="btn-group pull-left">
                                <button class="btn btn-primary submit btn-sm"><i
                                            class="icon-search"></i>&nbsp;&nbsp;<?php echo e(trans('admin.search'), false); ?></button>
                            </div>
                            <div class="btn-group pull-left " style="margin-left: 10px;">
                                <a href="<?php echo $action; ?>" class="btn btn-light btn-sm"><i
                                            class="icon-undo"></i>&nbsp;&nbsp;<?php echo e(trans('admin.reset'), false); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
</div>
<?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/filter/container.blade.php ENDPATH**/ ?>