
<?php
    $liabilities = getContent('offer_banner.element', null, false, true);
?>

<section class="py-3 py-lg-5">
    <div class="container">
        <div class="gap-3 d-flex align-items-center justify-content-between">
            <div>
                <h5 class="py-3 pt-3 m-0 fs-3"><?php echo app('translator')->get('Offers'); ?></h5>
            </div>
        </div>
        <div class="offer_slider2 service-slider">
            <?php $__currentLoopData = $liabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mx-1">
                    <a href="<?php echo e(route('asset.liability.request', $liability->id)); ?>">
                        <div class="p-2">
                            <div class="service-slider-box-plain">
                                <img src="<?php echo e(getImage('assets/images/frontend/offer_banner/' . @$liability->lang('slider'), '500x350')); ?>"
                                alt="" />
                                <div class="overlay-service-plain">
                                    <h5 class="px-2"><?php echo e(Str::limit(@$liability->lang('title'), 30, '...')); ?></h5>
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

        $(".offer_slider2").slick({
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




<?php /**PATH E:\Alsari Office\Amlek\resources\views/sections/offer_banner.blade.php ENDPATH**/ ?>