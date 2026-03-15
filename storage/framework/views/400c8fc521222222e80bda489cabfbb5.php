<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row">
        <?php $__currentLoopData = $requestProperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="my-2 col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card w-100 propertybox">
                <div class="property-image position-relative">
                    <img src="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>"
                        alt="<?php echo app('translator')->get('Image'); ?>" class="card-img-top" alt="...">
                </div>

                <div class="card-body">
                    <h5 class="card-title property-title">
                        <a href="<?php echo e(route('propertyRequestDetails', $property->id)); ?>">
                            <?php echo e($property->name); ?>

                        </a>
                    </h5>
                    <p class="card-text text-black-50 propery-location">
                        <?php echo e(app()->getLocale() == 'en' ? $property->country?->name : $property->country?->name_ar); ?> , <?php echo e(app()->getLocale() == 'en' ? $property->city?->name : $property->city?->name_ar); ?>

                    </p>
                    <p class="mt-4 mb-0 property-type-property">
                        <img src="<?php echo e(getImage(getFilePath('propertyType') . '/' . $property->propertyType->icon, getFileSize('propertyType'))); ?>"
                            alt="">
                        <?php echo e(app()->getLocale() == 'en' ? @$property->propertyType?->name : @$property->propertyType?->name_ar); ?>


                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row justify-content-center">
        <?php if($requestProperties->hasPages()): ?>
            <div class="col-md-6">
                <?php echo e($requestProperties->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Property Request'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/property_request_page.blade.php ENDPATH**/ ?>