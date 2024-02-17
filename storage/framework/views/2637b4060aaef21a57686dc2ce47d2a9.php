<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale'), false); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">

    <title><?php echo e(Admin::title(), false); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <?php if(!is_null($favicon = Admin::favicon())): ?>
    <link rel="shortcut icon" href="<?php echo e($favicon, false); ?>">
    <?php endif; ?>

    <?php echo Admin::css(); ?>

    <?php echo Admin::headerJs(); ?>

    <?php echo Admin::js(); ?>

    <?php echo Admin::js_trans(); ?>


</head>

<body class="<?php echo e(config('admin.skin'), false); ?> <?php echo e($body_classes, false); ?>">

    <?php if($alert = config('admin.top_alert')): ?>
        <div class="alert">
            <?php echo $alert; ?>

        </div>
    <?php endif; ?>
    <div class="wrapper">

        <?php echo $__env->make('admin::partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin::partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main id="main" class="p-4">

            <div id="pjax-container">
            <!--start-pjax-container-->
                <?php echo Admin::style(); ?>

                <div id="app">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <?php echo Admin::html(); ?>

                <?php echo Admin::script(); ?>

            <!--end-pjax-container-->
            </div>

        </main>
    </div>

    <?php if(1==2): ?>
        <?php echo $__env->make('admin::partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <button id="totop" title="Go to top" style="display: none;"><i class="icon-chevron-up"></i></button>

    <script>
        function LA() {}
        LA.token = "<?php echo e(csrf_token(), false); ?>";
        LA.user = <?php echo json_encode($_user_, 15, 512) ?>;
    </script>

    </body>
</html>
<?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/index.blade.php ENDPATH**/ ?>