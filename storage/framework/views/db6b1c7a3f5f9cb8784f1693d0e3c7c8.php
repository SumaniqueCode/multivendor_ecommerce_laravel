<div class="btn-group me-1">
    <a href="<?php echo e($grid->getExportUrl('all'), false); ?>" target="_blank" class="btn btn-sm btn-primary" title="<?php echo e(trans('admin.export'), false); ?>"><i class="icon-download"></i><span class="hidden-xs"> <?php echo e(trans('admin.export'), false); ?></span></a>
    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?php echo e($grid->getExportUrl('all'), false); ?>" target="_blank"><?php echo e(trans('admin.all'), false); ?></a></li>
        <li><a class="dropdown-item" href="<?php echo e($grid->getExportUrl('page', $page), false); ?>" target="_blank"><?php echo e(trans('admin.current_page'), false); ?></a></li>
        <li><a class="dropdown-item" href="<?php echo e($grid->getExportUrl('selected', '__rows__'), false); ?>" target="_blank" onclick="admin.grid.export_selected_row(event);" data-no_rows_selected="<?php echo e(__('admin.no_rows_selected'), false); ?>"><?php echo e(trans('admin.selected_rows'), false); ?></a></li>
    </ul>
</div>
<?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/components/export-btn.blade.php ENDPATH**/ ?>