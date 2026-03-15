
<div class="row mb-none-30">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-dark d-flex justify-content-between">
                <h6 class="text-white"><?php echo app('translator')->get(@$formTitle); ?></h6>
                <button type="button" class="btn btn-sm btn-outline-light float-end form-generate-btn"> <i
                        class="la la-fw la-plus"></i><?php echo app('translator')->get('Add New'); ?></button>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row addedField">
                        <?php if($form): ?>
                            <?php $__currentLoopData = $form->form_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4">
                                    <div class="mb-3 border card" id="<?php echo e($loop->index); ?>">
                                        <input type="hidden" name="form_generator[is_required][]"
                                            value="<?php echo e($formData->is_required); ?>">
                                        <input type="hidden" name="form_generator[extensions][]"
                                            value="<?php echo e($formData->extensions); ?>">
                                        <input type="hidden" name="form_generator[options][]"
                                            value="<?php echo e(implode(',', $formData->options)); ?>">

                                        <div class="card-body">
                                            <div class="mb-3 form-group">
                                                <label class="form-label"><?php echo app('translator')->get('Label'); ?></label>
                                                <input type="text" name="form_generator[form_label][]"
                                                    class="form-control" value="<?php echo e($formData->name); ?>" readonly>
                                            </div>
                                            <div class="mb-3 form-group">
                                                <label class="form-label"><?php echo app('translator')->get('Type'); ?></label>
                                                <input type="text" name="form_generator[form_type][]"
                                                    class="form-control" value="<?php echo e($formData->type); ?>" readonly>
                                            </div>
                                            <?php
                                                $jsonData = json_encode([
                                                    'type' => $formData->type,
                                                    'is_required' => $formData->is_required,
                                                    'label' => $formData->name,
                                                    'extensions' => explode(',', $formData->extensions) ?? 'null',
                                                    'options' => $formData->options,
                                                    'old_id' => '',
                                                ]);
                                            ?>
                                            <div class="gap-2 mt-3 d-flex">
                                                <button type="button" class="btn w-50 btn-primary editFormData"
                                                    data-form_item="<?php echo e($jsonData); ?>"
                                                    data-update_id="<?php echo e($loop->index); ?>"><i
                                                        class="las la-pen"></i></button>
                                                <button type="button" class="btn w-50 btn-danger removeFormData"><i
                                                        class="las la-times"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php /**PATH /home/amlaek/public_html/resources/views/admin/property_type/include/form_generate.blade.php ENDPATH**/ ?>