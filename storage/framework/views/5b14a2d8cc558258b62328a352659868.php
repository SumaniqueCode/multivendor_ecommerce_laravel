<div class="card box-default">
    <div class="card-header with-border">
        <h3 class="card-title">Dependencies</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-box-tool" data-bs-toggle="collapse" href="#dependencies" role="button" aria-expanded="true" aria-controls="dependencies">
                <i class="icon-minus"></i>
            </button>
        </div>
    </div>

    <!-- /.box-header -->
    <div class="card-body dependencies collapse show" id="dependencies">
        <div class="table-responsive">
            <table class="table table-striped">
                <?php $__currentLoopData = $dependencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dependency => $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td width="240px"><?php echo e($dependency, false); ?></td>
                    <td><span class="badge bg-primary"><?php echo e($version, false); ?></span></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
</div>
<?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/dashboard/dependencies.blade.php ENDPATH**/ ?>