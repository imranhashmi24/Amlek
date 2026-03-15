<?php $__env->startSection('content'); ?>
<section class="py-5 property property-bg-color">
    <div class="container">
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $floorPlanElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floorPlanElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="my-2 col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card w-100 propertybox">
                    <div class="property-image position-relative">
                        <img src="<?php echo e(getImage('assets/images/frontend/floor_plan/' . @$floorPlanElement->lang('plan'), '315x180')); ?>"  alt="<?php echo app('translator')->get('Image'); ?>" class="card-img-top">
                    </div>

                    <div class="card-body">
                       <div class="body-content">
                            <h5 class="card-title property-title">
                                <a href="#">
                                    <?php echo e(@$floorPlanElement->lang('title')); ?>

                                </a>
                            </h5>
                            <p>
                                <?php echo @$floorPlanElement->lang('description'); ?>

                            </p>
                       </div>
                        <div class="flan-view">
                            <a href="<?php echo e(getImage('assets/images/frontend/floor_plan/' . @$floorPlanElement->lang('plan'), '315x180')); ?>" class="m-2 btn" style="background-color: #39004E !important; color: #FFF"> <?php echo app('translator')->get('show Image'); ?> </a>
                            <a href="<?php echo e(route('showFloorPlan', $floorPlanElement->id)); ?>" class="btn btn-info m-2" style="background-color: #39004E !important; color: #FFF"> <?php echo app('translator')->get('View Floor Plan'); ?> </a>
                            
                            <a href="tel:+9660550217734" class="btn btn-success m-2">
                                <i class="fab fa-whatsapp"></i>
                                <span><?php echo app('translator')->get('Whatsapp'); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h4 class="py-5 text-center"><?php echo app('translator')->get('Floor plan not found'); ?></h4>
            <?php endif; ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
<style>
.property-image img{
        height: 200px !important;
    }
    .body-content{
        margin-bottom: 7px !important;
        height: 150px !important;
        overflow: hidden;
    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/web/js/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.flan-view').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
<?php $__env->stopPush(); ?>


<?php echo $__env->make('web.layouts.frontend', ['title' => 'Floor Plans'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/floor_plan.blade.php ENDPATH**/ ?>