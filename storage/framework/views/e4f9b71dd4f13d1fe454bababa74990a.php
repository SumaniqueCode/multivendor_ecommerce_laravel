<aside id="sidebar" class="menu-width sidebar bg-semi-dark">

    <?php if(config('admin.enable_user_panel')): ?>
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo e(Admin::user()->avatar, false); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo e(Admin::user()->name, false); ?></p>
            <!-- Status -->
            <a href="#"><i class="icon-circle text-success"></i> <?php echo e(trans('admin.online'), false); ?></a>
        </div>
    </div>
    <?php endif; ?>

    <?php if(config('admin.enable_menu_search')): ?>
    <!-- search form (Optional) -->
    <form class="sidebar-form" style="overflow: initial;" onsubmit="return false;">
        <div class="input-group">
            <input type="text" autocomplete="off" class="form-control autocomplete" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="icon-search"></i></button>
            </span>
            <ul class="dropdown-menu" role="menu" style="min-width: 210px;max-height: 300px;overflow: auto;">
                <?php $__currentLoopData = Admin::menuLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="<?php echo e(admin_url($link['uri']), false); ?>"><i class="<?php echo e($link['icon'], false); ?>"></i><?php echo e(admin_trans($link['title']), false); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </form>
    <!-- /.search form -->
    <?php endif; ?>

    <nav>

        <div class="custom-menu">
            <ul class="list-unstyled ps-0 root" id="menu">
                <?php echo $__env->renderEach('admin::partials.menu', Admin::menu(), 'item'); ?>
            </ul>
        </div>
    </nav>
</aside>
<?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/partials/sidebar.blade.php ENDPATH**/ ?>