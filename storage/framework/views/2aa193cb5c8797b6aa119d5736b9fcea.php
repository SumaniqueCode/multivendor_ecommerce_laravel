<?php echo $__env->make("admin::grid.table-header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-responsive" autocomplete="off">
            <table class="table grid-table table-sm table-hover select-table" id="<?php echo e($grid->tableID, false); ?>">

                <thead>
                    <tr>
                        <?php $__currentLoopData = $grid->visibleColumns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th <?php echo $column->formatHtmlAttributes(); ?>><?php echo $column->getLabel(); ?><?php echo $column->renderHeader(); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </thead>

                <?php if($grid->hasQuickCreate()): ?>
                    <?php echo $grid->renderQuickCreate(); ?>

                <?php endif; ?>

                <tbody>

                    <?php if($grid->rows()->isEmpty() && $grid->showDefineEmptyPage()): ?>
                        <?php echo $__env->make('admin::grid.empty-grid', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <?php $__currentLoopData = $grid->rows(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr <?php echo $row->getRowAttributes(); ?>>
                        <?php $__currentLoopData = $grid->visibleColumnNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td <?php echo $row->getColumnAttributes($name); ?>>
                            <?php echo $row->column($name); ?>

                        </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

                <?php echo $grid->renderTotalRow(); ?>


            </table>

        </div>

        <?php echo $grid->renderFooter(); ?>


        <?php echo $grid->paginator(); ?>


    </div>
        <!-- /.box-body -->
</div>
<?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/grid/table.blade.php ENDPATH**/ ?>