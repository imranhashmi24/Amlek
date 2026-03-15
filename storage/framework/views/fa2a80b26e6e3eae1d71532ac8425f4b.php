<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.sub.property.type.store',@$subpropertyType->id)); ?>" method="post"  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label"><?php echo app('translator')->get('Icon'); ?> <span class="text-danger fs-6">*</span></label>
                        <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['image' => ''.e(@$subpropertyType->image).'','name' => 'image','class' => 'w-100','type' => 'propertyType']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(@$subpropertyType->image).'','name' => 'image','class' => 'w-100','type' => 'propertyType']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $attributes = $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $component = $__componentOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Property Type'); ?> <span class="text-danger fs-6">*</span></label>
                            <select class="form-control" name="property_type_id" required>
                                <option value="" disabled><?php echo app('translator')->get('Select One'); ?></option>
                                <?php $__currentLoopData = $property_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($property_type->id); ?>" <?php if(old('property_type_id',@$subpropertyType->property_type_id == @$property_type->id)): echo 'selected'; endif; ?>>
                                        <?php if(app()->getLocale() == 'en'): ?>
                                        <?php echo e($property_type->name); ?>

                                        <?php else: ?>
                                        <?php echo e($property_type->name_ar); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Name'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name',@$subpropertyType->name)); ?>" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Name Ar'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name_ar" class="form-control" value="<?php echo e(old('name_ar',@$subpropertyType->name_ar)); ?>" required>
                        </div>
                        <div class="mb-3 form-group">
                           <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('admin.sub.property.type.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        <?php echo app('translator')->get('Back'); ?></a>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/sub_property_type/create.blade.php ENDPATH**/ ?>