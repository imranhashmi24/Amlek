<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Name'); ?></span>
                                        <b> <?php echo e($propertyType->lang('name')); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Status'); ?></span>
                                        <b>  <?php echo $propertyType->statusBadge ?> </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="property-image">
                                <img src="<?php echo e(getImage(getFilePath('propertyType') . '/' . $propertyType->icon, getFileSize('propertyType'))); ?>"
                                            alt="<?php echo app('translator')->get('Image'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="my-3 row">
                        <?php echo $__env->make('admin.property_type.include.form_generate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal66101d0e9682fa01095a4462ff74d1a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal66101d0e9682fa01095a4462ff74d1a4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-generator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form-generator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal66101d0e9682fa01095a4462ff74d1a4)): ?>
<?php $attributes = $__attributesOriginal66101d0e9682fa01095a4462ff74d1a4; ?>
<?php unset($__attributesOriginal66101d0e9682fa01095a4462ff74d1a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal66101d0e9682fa01095a4462ff74d1a4)): ?>
<?php $component = $__componentOriginal66101d0e9682fa01095a4462ff74d1a4; ?>
<?php unset($__componentOriginal66101d0e9682fa01095a4462ff74d1a4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="flex-wrap gap-3 d-flex">
        <a href="<?php echo e(route('admin.property.type.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise pe-1"></i>
            <?php echo app('translator')->get('Back'); ?></a>
    </div>
<?php $__env->stopPush(); ?>



<?php $__env->startPush('style'); ?>
    <style>
         .card-body .card-list {
            display: flex;
            padding: 8px;
            flex-wrap: nowrap;
            border-bottom: 1px solid #cccccc;
            justify-content: space-between;

        }

        .card-body .card-list:last-child {
            border-bottom: none;
        }

        .property-image {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .property-image img{
            width: 170px;
            height: 170px;
            display: flex;
            border: 1px solid #cccccc;
            border-radius: 5px;
            overflow: hidden;
        }
    </style>
<?php $__env->stopPush(); ?>



<?php $__env->startPush('script'); ?>
    <script>
        "use strict"
        var formGenerator = new FormGenerator();
        formGenerator.totalField = <?php echo e($form ? count((array) $form->form_data) : 0); ?>

    </script>

    <script src="<?php echo e(asset('assets/global/js/form_actions.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', ['title' => 'Property Type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/property_type/show.blade.php ENDPATH**/ ?>