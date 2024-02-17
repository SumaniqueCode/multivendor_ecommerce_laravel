<?php if(Admin::user()->visible(\Illuminate\Support\Arr::get($item, 'roles', [])) && Admin::user()->can(\Illuminate\Support\Arr::get($item, 'permission'))): ?>
    <?php if(!isset($item['children'])): ?>
        <li>
            <?php if(url()->isValidUrl($item['uri'])): ?>
                <a href="<?php echo e($item['uri'], false); ?>" target="_blank">
            <?php else: ?>
                 <a href="<?php echo e(admin_url($item['uri']), false); ?>">
            <?php endif; ?>
                <i class="<?php echo e($item['icon'], false); ?>"></i>
                <?php if(Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title']))))): ?>
                    <span><?php echo e(__($titleTranslation), false); ?></span>
                <?php else: ?>
                    <span><?php echo e(admin_trans($item['title']), false); ?></span>
                <?php endif; ?>
            </a>
        </li>
    <?php else: ?>
        <li class="treeview">
            <a href="#" class="has-subs" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($item['id'], false); ?>" aria-expanded="false">
                <i class="<?php echo e($item['icon'], false); ?>"></i>
                <?php if(Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title']))))): ?>
                    <span><?php echo e(__($titleTranslation), false); ?></span>
                <?php else: ?>
                    <span><?php echo e(admin_trans($item['title']), false); ?></span>
                <?php endif; ?>
            </a>
            <ul id="collapse-<?php echo e($item['id'], false); ?>" class="btn-toggle-nav list-unstyled collapse fw-normal pb-1">
                <?php $__currentLoopData = $item['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('admin::partials.menu', $item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/partials/menu.blade.php ENDPATH**/ ?>