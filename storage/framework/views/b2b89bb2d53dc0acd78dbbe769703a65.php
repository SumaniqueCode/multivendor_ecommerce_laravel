<style>
    h4 small{
        font-size:1rem;
    }
</style>
<div class="card card-primary">
    <div class="card-header with-border">
        <h3 class="card-title">Scaffold</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form method="post" action="<?php echo e($action, false); ?>" class="needs-validation" autocomplete="off" id="scaffold" pjax-container>

            <div class="card-body">

                <div class="row mb-3">

                    <label for="inputTableName" class="col-sm-2 control-label">Table name</label>

                    <div class="col-sm-4">
                        <input type="text" name="table_name" class="form-control" id="inputTableName" placeholder="table name" value="<?php echo e(old('table_name'), false); ?>" required>
                    </div>

                    <span class="invalid-feedback" id="table-name-help">
                        <i class="icon-info"></i>&nbsp; Table name can't be empty!
                    </span>

                </div>
                <div class="row mb-3">
                    <label for="inputModelName" class="col-sm-2 control-label">Model</label>

                    <div class="col-sm-4">
                        <input type="text" name="model_name" class="form-control" id="inputModelName" placeholder="model" value="<?php echo e(old('model_name', "App\\Models\\"), false); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputControllerName" class="col-sm-2 control-label">Controller</label>

                    <div class="col-sm-4">
                        <input type="text" name="controller_name" class="form-control" id="inputControllerName" placeholder="controller" value="<?php echo e(old('controller_name', "App\\Admin\\Controllers\\"), false); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="offset-sm-2 col-sm-10 d-flex justify-content-start">
                        <div class="pe-3 ps-1">
                            <input class="form-check-input" type="checkbox" checked value="migration" id="migration" name="create[]" />
                            <label for="migration">Create migration</label>
                        </div>
                        <div class="pe-3">
                            <input class="form-check-input" type="checkbox" checked value="model" id="model" name="create[]" />
                            <label for="model">Create model</label>
                        </div>
                        <div class="pe-3">
                            <input class="form-check-input" type="checkbox" checked value="controller" id="controller" name="create[]" />
                            <label for="controller">Create controller</label>
                        </div>
                        <div class="pe-3">
                            <input class="form-check-input" type="checkbox" checked value="migrate" id="migrate" name="create[]" />
                            <label for="migrate">Run migrate</label>
                        </div>
                        <div class="pe-3">
                            <input class="form-check-input" type="checkbox" checked value="menu_item" id="menu_item" name="create[]" />
                            <label for="menu_item">Create menu item</label>
                        </div>
                    </div>
                </div>

                <hr />

                <h4>Fields <small>(Note, id is already included in field list)</small></h4>

                <table class="table table-hover" id="table-fields">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th style="width: 200px">Field name</th>
                            <th>Type</th>
                            <th>Nullable</th>
                            <th>Key</th>
                            <th>Default value</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-fields-body">

                    <?php if(old('fields')): ?>
                        <?php $__currentLoopData = old('fields'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><i class="icon-arrows-alt move-handle"></i></td>
                                <td>
                                    <input type="text" name="fields[<?php echo e($index, false); ?>][name]" class="form-control" placeholder="field name" value="<?php echo e($field['name'], false); ?>" />
                                </td>
                                <td>
                                    <select class="form-select" style="width: 200px" name="fields[<?php echo e($index, false); ?>][type]">
                                        <?php $__currentLoopData = $dbTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type, false); ?>" <?php echo e($field['type'] == $type ? 'selected' : '', false); ?>><?php echo e($type, false); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td><input class="form-check-input" type="checkbox" name="fields[<?php echo e($index, false); ?>][nullable]" <?php echo e(\Illuminate\Support\Arr::get($field, 'nullable') == 'on' ? 'checked': '', false); ?>/></td>
                                <td>
                                    <select class="form-select" style="width: 150px" name="fields[<?php echo e($index, false); ?>][key]">
                                        
                                        <option value="" <?php echo e($field['key'] == '' ? 'selected' : '', false); ?>>NULL</option>
                                        <option value="unique" <?php echo e($field['key'] == 'unique' ? 'selected' : '', false); ?>>Unique</option>
                                        <option value="index" <?php echo e($field['key'] == 'index' ? 'selected' : '', false); ?>>Index</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" placeholder="default value" name="fields[<?php echo e($index, false); ?>][default]" value="<?php echo e($field['default'], false); ?>"/></td>
                                <td><input type="text" class="form-control" placeholder="comment" name="fields[<?php echo e($index, false); ?>][comment]" value="<?php echo e($field['comment'], false); ?>" /></td>
                                <td><a class="btn btn-sm btn-danger table-field-remove"><i class="icon-trash"></i> remove</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                        <td><i class="icon-arrows-alt move-handle"></i></td>
                        <td>
                            <input type="text" name="fields[0][name]" class="form-control" placeholder="field name" />
                        </td>
                        <td>
                            <select class="form-select" style="width: 200px" name="fields[0][type]">
                                <?php $__currentLoopData = $dbTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type, false); ?>"><?php echo e($type, false); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="fields[0][nullable]" checked /></td>
                        <td>
                            <select class="form-select" style="width: 150px" name="fields[0][key]">
                                
                                <option value="" selected>NULL</option>
                                <option value="unique">Unique</option>
                                <option value="index">Index</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" placeholder="default value" name="fields[0][default]"></td>
                        <td><input type="text" class="form-control" placeholder="comment" name="fields[0][comment]"></td>
                        <td><a class="btn btn-sm btn-danger table-field-remove"><i class="icon-trash"></i> remove</a></td>
                    </tr>
                    <?php endif; ?>
                    </tbody>
                </table>

                <hr style="margin-top: 0;"/>

                <div class='d-flex align-items-center'>

                    <div class='form-group flex-grow-1 '>
                        <a class="btn btn-sm btn-success" id="add-table-field"><i class="icon-plus"></i>&nbsp;&nbsp;Add field</a>

                    </div>


                    <div class='form-group ps-3'>
                        <input type="checkbox" class="form-check-input" checked id="timestamps" name="timestamps">
                        <label for="timestamps">Created_at & Updated_at </label>
                        &nbsp;&nbsp;
                        <input type="checkbox" class="form-check-input" id="soft-deletes" name="soft_deletes">
                        <label for="soft-deletes">Soft deletes</label>
                    </div>

                    <div class='form-group d-flex align-items-center ps-3'>
                        <label for="inputPrimaryKey pe-2">Primary key &nbsp;</label>
                        <input type="text" name="primary_key" class="form-control" id="inputPrimaryKey" placeholder="Primary key" value="id" style="width: 100px;">
                    </div>


                </div>


            </div>
            <div class="card-footer clearfix">
                <button type="submit" class="btn btn-info float-end">submit</button>
            </div>

            <?php echo e(csrf_field(), false); ?>


        </form>
    </div>
</div>

<template id="table-field-tpl">
    <tr>
        <td><i class="icon-arrows-alt move-handle"></i></td>
        <td>
            <input type="text" name="fields[__index__][name]" class="form-control" placeholder="field name" />
        </td>
        <td>
            <select class="form-select" style="width: 200px" name="fields[__index__][type]">
                <?php $__currentLoopData = $dbTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type, false); ?>"><?php echo e($type, false); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </td>
        <td><input type="checkbox" class="form-check-input" name="fields[__index__][nullable]" checked /></td>
        <td>
            <select class="form-select" style="width: 150px" name="fields[__index__][key]">
                <option value="" selected>NULL</option>
                <option value="unique">Unique</option>
                <option value="index">Index</option>
            </select>
        </td>
        <td><input type="text" class="form-control" placeholder="default value" name="fields[__index__][default]"></td>
        <td><input type="text" class="form-control" placeholder="comment" name="fields[__index__][comment]"></td>
        <td><a class="btn btn-sm btn-danger table-field-remove"><i class="icon-trash"></i> remove</a></td>
    </tr>
</template>

<template id="model-relation-tpl">

        <td><input type="text" class="form-control" placeholder="relation name" value=""></td>
        <td>
            <select style="width: 150px">
                <option value="HasOne" selected>HasOne</option>
                <option value="BelongsTo">BelongsTo</option>
                <option value="HasMany">HasMany</option>
                <option value="BelongsToMany">BelongsToMany</option>
            </select>
        </td>
        <td><input type="text" class="form-control" placeholder="related model"></td>
        <td><input type="text" class="form-control" placeholder="default value"></td>
        <td><input type="text" class="form-control" placeholder="default value"></td>
        <td><input type="checkcard" /></td>
        <td><a class="btn btn-sm btn-danger model-relation-remove"><i class="icon-trash"></i> remove</a></td>

</template>

<script>

(function () {

    //$('select').select2();

    var el = document.getElementById('table-fields-body');
    var sortable = Sortable.create(el,{
        handle: ".move-handle"
    });

    document.getElementById('add-table-field').addEventListener("click",function (event) {

        let template = document.getElementById('table-field-tpl').innerHTML;
        let fieldRow = (String(template)).replace(/__index__/g, String(document.querySelectorAll('#table-fields tr').length - 1));
        let newRow = document.createElement('tr');
        newRow.innerHTML = fieldRow;
        console.log(newRow);

        document.querySelector('#table-fields-body').appendChild(newRow);
        // maybe add nice select function
    });

    document.getElementById('table-fields').addEventListener("click",function(event){
        if (!event.target.closest('.table-field-remove')) return;
        event.target.closest('tr').remove();
    });

    if (document.getElementById('add-model-relation')){
        // not implemented yet :-(
        document.getElementById('add-model-relation').addEventListener("click",function (event) {
            document.getElementById('model-relations tbody').append(document.getElementById('model-relation-tpl').html().replace(/__index__/g, document.getElementById('model-relations tr').length - 1));

            relation_count++;
        });

        document.getElementById('table-fields').querySelectorAll('.model-relation-remove').forEach( elm => {
            elm.addEventListener("click", function(event) {
                event.target.closest('tr').remove();
            });
        });
    }

    document.getElementById('scaffold').addEventListener('submit', function (event) {

        event.preventDefault();

        if (document.getElementById('inputTableName').value == '') {
            document.getElementById('inputTableName').closest('.form-group').classList.add('has-error');
            document.getElementById('table-name-help').classList.remove('hide');

            return false;
        }

        return true;
    });
})();

</script>
<?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-ext\helpers\src/../resources/views/scaffold.blade.php ENDPATH**/ ?>