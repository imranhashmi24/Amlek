<?php
    $requestProperties = \App\Models\PropertyRequest::accepted()->latest()->take(10)->get();
?>

<section class="py-3 py-lg-5">
    <div class="container">
        <div class="gap-3 d-flex align-items-center justify-content-between">
            <div>
                <h5 class="py-3 pt-3 m-0 fs-3"><?php echo app('translator')->get('Opportunities'); ?></h5>
            </div>
            <div class="">
                <a href="<?php echo e(route('propertyRequestPage')); ?>" class="text-decoration-none">
                    <?php echo app('translator')->get('See more'); ?>
                </a>
            </div>
        </div>
        <div class="property_request_slider service-slider">
            <?php $__currentLoopData = $requestProperties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyRequestElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mx-1">
                    <a href="<?php echo e(route('propertyRequestDetails', $propertyRequestElement->id)); ?>">
                        <div class="p-2">
                            <div class="service-slider-box-plain">
                                <img src="<?php echo e(getImage('assets/admin/images/property_thumb/' . @$propertyRequestElement->thumb_image, '500x350')); ?>"
                                alt="">
                                <div class="overlay-service-plain">
                                    <h5 class="px-2"><?php echo e(Str::limit(@$propertyRequestElement->detail, 30, '...')); ?></h5>
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

        $(".property_request_slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1800,
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

<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/property_request_section.blade.php ENDPATH**/ ?>