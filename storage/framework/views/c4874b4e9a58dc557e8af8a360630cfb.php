<!-- Main Header -->
<header class="custom-navbar navbar navbar-light bg-white p-0 align-items-stretch">
    <a class="navbar-brand menu-width container-md bg-semi-dark text-center" href="<?php echo e(admin_url('/'), false); ?>">
        <span class="short"><?php echo config('admin.logo-mini', config('admin.name')); ?></span><span class="long"><?php echo config('admin.logo', config('admin.name')); ?></span>
    </a>
    <div class="d-flex flex-fill flex-wrap header-items">

        <a class="flex-shrink order-1 order-sm-0 valign-header px-4 link-secondary" type="button" id='menu-toggle' aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="icon-bars"></i>
        </a>

        <ul class="nav navbar-nav hidden-sm visible-lg-block">
            <?php echo Admin::getNavbar()->render('left'); ?>

        </ul>

        <div class="flex-fill search order-0 order-sm-1" style="display:none;">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </div>

        <ul class="nav order-2 ms-auto d-flex align-items-center">

            <?php echo Admin::getNavbar()->render(); ?>


            <li class="nav-item">
                <div class="dropdown user-menu d-flex align-items-center px-3" href="#" role="button" id="user-menu-link" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="bg-light inline rounded-circle user-image">
                        <img src="<?php echo e(Admin::user()->avatar, false); ?>" alt="User Image">
                    </span>
                    <span class="hidden-xs"><?php echo e(Admin::user()->name, false); ?></span>
                </div>
                <ul class="dropdown-menu dropdown-menu-end user-menu" aria-labelledby="user-menu-link">
                    <!-- The user image in the menu -->
                    <li class="user-header text-center bg-semi-dark p-3">
                        <span class="bg-light inline rounded-circle user-image medium">
                            <img src="<?php echo e(Admin::user()->avatar, false); ?>" alt="User Image">
                        </span>
                        <p>
                            <h2><?php echo e(Admin::user()->name, false); ?></h2>
                            <small>Member since admin <?php echo e(Admin::user()->created_at, false); ?></small>
                        </p>
                    </li>
                    <li class="user-footer p-2 clearfix">
                        <div class="float-start">
                            <a href="<?php echo e(admin_url('auth/setting'), false); ?>" class="btn btn-secondary"><?php echo e(__('admin.setting'), false); ?></a>
                        </div>
                        <div class="float-end">
                            <a href="<?php echo e(admin_url('auth/logout'), false); ?>" class="btn no-ajax btn-secondary"><?php echo e(__('admin.logout'), false); ?></a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/partials/header.blade.php ENDPATH**/ ?>