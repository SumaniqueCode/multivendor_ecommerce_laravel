<?php echo $__env->make("admin::form._header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(!empty($attributes_obj['readonly'])): ?>
        <input type="hidden" name="<?php echo e($name, false); ?>" value="<?php echo e($value, false); ?>" />
        <?php endif; ?>

        <select class="form-select <?php echo e($class, false); ?>" style="width: 100%;" name="<?php echo e($name, false); ?><?php if(!empty($attributes_obj['readonly'])): ?>-disabled <?php endif; ?>" <?php echo $attributes; ?> >
            <?php if($groups): ?>
                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <optgroup label="<?php echo e($group['label'], false); ?>">
                        <?php $__currentLoopData = $group['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $select => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($select, false); ?>" <?php echo e($select == old($column, $value) ?'selected':'', false); ?>><?php echo e($option, false); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php else: ?>
                <option value=""></option>
                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $select => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($select, false); ?>" <?php echo e($select == old($column, $value) ?'selected':'', false); ?>><?php echo e($option, false); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>

<?php echo $__env->make("admin::form._footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/form/select.blade.php ENDPATH**/ ?>