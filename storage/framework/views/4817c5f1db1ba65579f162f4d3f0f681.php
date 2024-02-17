<div class="card box-default">
    <div class="card-header with-border">
        <h3 class="card-title">Environment</h3>

        <div class="card-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-bs-toggle="collapse" href="#environment" role="button" aria-expanded="true" aria-controls="environment">
                <i class="icon-minus"></i>
            </button>
        </div>
    </div>

    <!-- /.box-header -->
    <div class="card-body collapse show" id="environment">
        <div class="table-responsive">
            <table class="table table-striped">

                <?php $__currentLoopData = $envs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $env): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td width="120px"><?php echo e($env['name'], false); ?></td>
                    <td><?php echo e($env['value'], false); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
</div><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/dashboard/environment.blade.php ENDPATH**/ ?>