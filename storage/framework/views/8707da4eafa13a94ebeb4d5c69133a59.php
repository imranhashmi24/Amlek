<?php $__env->startSection('content'); ?>
<section class="py-5 property property-bg-color">
    <div class="container">
        <?php echo $__env->make($navbar, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <hr>
        <div class="py-3 row">
            <div class="pb-3 col-12">
                <div class="sort-property d-flex justify-content-between align-items-center">
                    <div>
                        <?php
                            $property_count = count($property_items);
                        ?>
                        <p class="m-0"><?php echo app('translator')->get('Find'); ?> <b><?php echo $property_count; ?></b> <?php echo app('translator')->get('properties'); ?></p>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('web.component.all_property_map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>
</section>

<?php if(@$sections->secs != null): ?>
    <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/custom.css')); ?>">
<?php $__env->stopPush(); ?>


<?php echo $__env->make('web.layouts.frontend', ['title' => 'Auctions Maps'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/auction_maps.blade.php ENDPATH**/ ?>