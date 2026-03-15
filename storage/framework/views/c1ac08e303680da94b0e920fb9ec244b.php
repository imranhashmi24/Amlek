<?php
    $floorPlanElements = getContent('floor_plan.element', null, false, true);
?>

<section class="py-3 py-lg-5">
    <div class="container">
        <div class="gap-3 d-flex align-items-center justify-content-between">
            <div class="">
                <h5 class="py-3 pt-3 m-0 fs-3"><?php echo app('translator')->get('Properties area plan on offers'); ?></h5>
            </div>
            <div class="">
                <a href="<?php echo e(route('floor-plans')); ?>" class="text-decoration-none">
                    <?php echo app('translator')->get('See more'); ?>
                </a>
            </div>
        </div>
        <div class="floor_plan service-slider">
            <?php $__currentLoopData = $floorPlanElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floorPlanElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mx-1">
                    <a href="<?php echo e(route('showFloorPlan', $floorPlanElement->id)); ?>">
                        <div class="p-2">
                            <div class="service-slider-box-plain">
                                <img src="<?php echo e(getImage('assets/images/frontend/floor_plan/' . @$floorPlanElement->lang('plan'), '315x180')); ?>" alt="">
                                <div class="overlay-service-plain">
                                    <h5><?php echo e(Str::limit(@$floorPlanElement->lang('title'), 30, '...')); ?></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick-theme.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/web/js/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(".floor_plan").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
            dots: false,
            arrows: false,
            <?php if(session()->get('lang') == 'ar'): ?>
                rtl: true,
            <?php endif; ?>
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },

            ]
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\Alsari Office\Amlek\resources\views/sections/floor_plan.blade.php ENDPATH**/ ?>