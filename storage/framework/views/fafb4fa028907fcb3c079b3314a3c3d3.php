<!-- breadcrumb start -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
<?php if($breadcrumb): ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(admin_url('/'), false); ?>"><i class="icon-home"></i> <?php echo e(__('Home'), false); ?></a></li>
    <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($loop->last): ?>
        <li class="breadcrumb-item active">
                <?php if(\Illuminate\Support\Arr::has($item, 'icon')): ?>
                    <i class="icon-<?php echo e($item['icon'], false); ?>"></i>
                <?php endif; ?>
                <?php echo e($item['text'], false); ?>

            </li>
        <?php else: ?>
        <li class="breadcrumb-item">
            <?php if(\Illuminate\Support\Arr::has($item, 'url')): ?>
                <a href="<?php echo e(admin_url(\Illuminate\Support\Arr::get($item, 'url')), false); ?>">
                    <?php if(\Illuminate\Support\Arr::has($item, 'icon')): ?>
                        <i class="icon-<?php echo e($item['icon'], false); ?>"></i>
                    <?php endif; ?>
                    <?php echo e($item['text'], false); ?>

                </a>
            <?php else: ?>
                <?php if(\Illuminate\Support\Arr::has($item, 'icon')): ?>
                    <i class="icon-<?php echo e($item['icon'], false); ?>"></i>
                <?php endif; ?>
                <?php echo e($item['text'], false); ?>

            <?php endif; ?>
        </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ol>
<?php elseif(config('admin.enable_default_breadcrumb')): ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(admin_url('/'), false); ?>"><i class="icon-home"></i>Home</a></li>
    <?php for($i = 2; $i <= count(Request::segments()); $i++): ?>
    <li class="breadcrumb-item">
            <a href="<?php echo e(admin_url(implode('/',array_slice(Request::segments(),1,$i-1))), false); ?>">
                <?php echo e(ucfirst(Request::segment($i)), false); ?>

            </a>
        </li>
    <?php endfor; ?>
</ol>
<?php endif; ?>
</nav><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/partials/breadcrumb.blade.php ENDPATH**/ ?>