
<!-- Chat card -->
<div class="card card-primary">
    <div class="card-header with-border">
        <i class="icon-terminal"></i>
    </div>
    <div class="card-body chat" id="terminal-card">
        <!-- chat item -->

        <!-- /.item -->
    </div>
    <!-- /.chat -->
    <div class="card-footer with-border">

        <div style="margin-bottom: 10px;">

            <?php $__currentLoopData = $commands['groups']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $command): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="btn-group dropup">
                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo e($group, false); ?>

                </button>
                <ul class="dropdown-menu">
                    <?php $__currentLoopData = $command; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="dropdown-item loaded-command"><?php echo e($item, false); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="btn-group dropup">
                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Other
                </button>
                <ul class="dropdown-menu">
                    <?php $__currentLoopData = $commands['others']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a class="dropdown-item loaded-command"><?php echo e($item, false); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <button type="button" class="btn btn-success" id="terminal-send"><i class="fa fa-paper-plane"></i> send</button>

            <button type="button" class="btn btn-warning" id="terminal-clear"><i class="fa fa-refresh"></i> clear</button>
        </div>

        <div class="input-group">
            <span class="input-group-text px-2">artisan</span>
            <input class="form-control input-lg" id="terminal-query" placeholder="command">
        </div>
    </div>
</div>
<?php echo $__env->make("open-admin-helpers::_shared", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-ext\helpers\src/../resources/views/artisan.blade.php ENDPATH**/ ?>