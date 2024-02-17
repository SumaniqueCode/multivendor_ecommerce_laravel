
<div class="card p-0">
    <?php if(isset($title)): ?>
        <div class="card-header">
            <h3 class="card-title"> <?php echo e($title, false); ?></h3>
        </div>
    <?php endif; ?>

	<div class="container-fluid card-header no-border">
        <?php if( $grid->showTools() || $grid->showExportBtn() || $grid->showCreateBtn() ): ?>
        <div class="row">
            <div class="col-auto me-auto">
                <?php echo $grid->renderCreateButton(); ?>

                <?php if( $grid->showTools() ): ?>
                <?php echo $grid->renderHeaderTools(); ?>

                <?php endif; ?>
            </div>
            <div class="col-auto">
                <?php echo $grid->renderExportButton(); ?>

                <?php echo $grid->renderColumnSelector(); ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php echo $grid->renderFilter(); ?>

    <?php echo $grid->renderHeader(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/grid/table-header.blade.php ENDPATH**/ ?>