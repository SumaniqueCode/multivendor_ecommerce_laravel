<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $css_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="stylesheet" href="<?php echo e($css_file, false); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($css)): ?>
        <style type="text/css"><?php echo e($css, false); ?></style>
    <?php endif; ?>

    <section class="content-header clearfix">
        <h1>
            <?php echo $header ?: trans('admin.title'); ?>

            <small><?php echo $description ?: trans('admin.description'); ?></small>
        </h1>

        <?php echo $__env->make('admin::partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>

    <section class="content">

        <?php echo $__env->make('admin::partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin::partials.exception', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin::partials.toastr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($_view_): ?>
            <?php echo $__env->make($_view_['view'], $_view_['data'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $_content_; ?>

        <?php endif; ?>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::index', ['header' => strip_tags($header)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/content.blade.php ENDPATH**/ ?>