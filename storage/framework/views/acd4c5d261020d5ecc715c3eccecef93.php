
<section class="py-3 py-lg-5">
    <div class="container">
        <div class="gap-3 d-flex align-items-center justify-content-between">
            <div class="">
                <h5 class="py-3 pt-3 m-0 fs-3"><?php echo app('translator')->get('Auctions'); ?></h5>
            </div>
            <div class="">
                <a href="<?php echo e(route('auctions')); ?>" class="text-decoration-none">
                    <?php echo app('translator')->get('See more'); ?>
                </a>
            </div>
        </div>
        <div class="auction-slider">
            <?php $__currentLoopData = $auctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo e(getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb'))); ?>" alt="">
                        <div class="card-love">
                            <button type="button" class="love-btn react"  data-type="auction" data-item="<?php echo e($auction->id); ?>">
                                <i class="fa fa-heart <?php echo e(findMyFvt('auction', $auction->id) ? 'text-danger' : ''); ?>"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-content">
                        <p><span><?php echo app('translator')->get('Start on'); ?>: <?php echo e(showDateTime($auction->beginning_time, 'l h:i A')); ?></span></p>
                        <p><span><?php echo app('translator')->get('Duration'); ?>:<?php echo e($auction->auction_day); ?> <?php echo app('translator')->get('Days'); ?></span></p>
                        <a href="<?php echo e(route('auction.details', $auction->slug)); ?>" class="view-btn">
                            <?php echo app('translator')->get('View Details'); ?>
                        </a>
                    </div>

                    <div class="title-overlay">
                        <div class="title-content">
                            <h3>
                                <?php if(app()->getLocale() == 'en'): ?>
                                    <?php echo e($auction->title); ?>

                                <?php else: ?>
                                    <?php echo e($auction->title_ar); ?>

                                <?php endif; ?>
                            </h3>
                            <p>
                                <i class="bi bi-geo-alt-fill"></i>
                                <?php if(app()->getLocale() == 'en'): ?>
                                    <?php echo e(optional($auction->city)->name); ?> , <?php echo e(optional($auction->country)->name); ?>

                                <?php else: ?>
                                    <?php echo e(optional($auction->city)->name_ar); ?>, <?php echo e(optional($auction->country)->name_ar); ?>

                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-overlay" id="countdown_<?php echo e($auction->id); ?>">
                        <?php echo $__env->make('web.pages.includes.__auction_time', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>


<?php echo $__env->make('web.component.__js_fvt_react', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick-theme.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/web/js/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(".auction-slider").slick({
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
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },

            ]

        });
    </script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('style'); ?>
    <style>
        .auction-slider .card{
            margin: 10px !important;
            height: 400px !important;
        }

        .card-overlay {
            position: absolute;
            top: 58%;
        }

        /* Image styles */
        .card-image {
            position: relative;
            width: 100%;
            border-radius: 15px 15px 0 0;
            overflow: hidden;
            z-index: 0;

        }

        .card-image img {
            width: 100%;
            height: 215px !important;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        @media (max-width: 768px) {
            .auction-slider .card{
                margin: 10px !important;
                height: 280px !important;
            }

            .card-overlay {
                position: absolute;
                top: 50%;
                height: 50px !important;

            }
            .time-count{
                width: 50px !important;
            }

            .overly-content p{
                color: #000 !important;
                line-height: 2px;
                font-size: 10px;
            }

            .overly-content p:nth-of-type(2){
                font-size: 8px;
            }

            .card-content{
                padding: 45px 20px 0px 20px;
                background-color: #ffffff;
                border-radius: 0 0 15px 15px;
                box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
                z-index: 1;
            }

            .card-content p span{
                line-height: 5px !important;
                font-size: 9px !important;
            }

            /* Image styles */
            .card-image {
                position: relative;
                width: 100%;
                border-radius: 15px 15px 0 0;
                overflow: hidden;
                z-index: 0;

            }

            .card-image img {
                width: 100%;
                height: 130px !important;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .view-btn{
                height: 28px;
                padding: 5px;
                gap: 5px;
                border-radius: 8px;
                opacity: 1;
                background: var(--theme-color);
                color: var(--white);
                justify-content: center;
                align-items: center;
                margin: 5px 0px 20px 0px;
                text-transform: uppercase;
                z-index: 9;
                font-size: 12px;
            }

            .title-overlay{
                position: absolute;
                top: 70px;
                left: 25px;
                width: 90%;
            }

            .title-overlay .title-content{
                color: var(--white);
                line-height: 2px;
            }

            .title-overlay .title-content h3
            {
                font-size: 14px;
            }

            .title-overlay .title-content p{
                font-size: 10px;
            }

            .card-love{
                position: absolute;
                top: 20px;
                left: 20px;
            }

            .card-love .love-btn{
                padding: 0px;
                width: 25px;
                height: 25px;
                border-radius: 50%;
                border: none;
                background-color: rgba(136, 136, 136, 1);
            }

            .card-love .love-btn i{
                padding-top: -20px !important;
                font-size: 14px;
            }

            .expired{
                padding-top: 15px;
                font-size: 10px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/auction_section.blade.php ENDPATH**/ ?>