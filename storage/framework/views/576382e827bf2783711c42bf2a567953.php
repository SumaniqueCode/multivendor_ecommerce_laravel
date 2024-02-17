<style>
    .ext-icon {
        color: rgba(0,0,0,0.5);
        margin-left: 10px;
    }
    .installed {
        color: #00a65a;
        margin-right: 10px;
    }
</style>
<div class="card box-default">
    <div class="card-header with-border">
        <h3 class="card-title">Available extensions</h3>

        <div class="card-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-bs-toggle="collapse" href="#extensions" role="button" aria-expanded="true" aria-controls="extensions">
                <i class="icon-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="card-body collapse show" id="extensions">
        <ul class="products-list product-list-in-box">

            <?php $__currentLoopData = $extensions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="item">
                <div class="product-img">
                    <i class="icon-<?php echo e($extension['icon'], false); ?> fa-2x ext-icon"></i>
                </div>
                <div class="product-info">
                    <a href="<?php echo e($extension['link'], false); ?>" target="_blank" class="product-title">
                        <?php echo e($extension['name'], false); ?>

                    </a>
                    <?php if($extension['installed']): ?>
                        <span class="pull-right installed"><i class="icon-check"></i></span>
                    <?php endif; ?>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- /.item -->
        </ul>
    </div>
    <!-- /.box-body -->
    <div class="card-footer text-center">
        <a href="https://github.com/open-admin-org" target="_blank" class="uppercase">View All Extensions</a>
    </div>
    <!-- /.box-footer -->
</div><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/dashboard/extensions.blade.php ENDPATH**/ ?>