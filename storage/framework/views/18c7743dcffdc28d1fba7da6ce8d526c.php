<?php
    $partnerContent = getContent('partner_slider.content', true);
    $partnerElements = getContent('partner_slider.element', null, false, true);
?>




<!--    partner section-->
<section class="partner-section py-5">
    <div class="container pb-5">
        <div class="section-title">
            <h2 class="after-line text-center text-capitalize"> <?php echo e($partnerContent->lang('header')); ?> </h2>
        </div>
        <div>
            <div class="partner_slider mt-5 slider-width-control">
                <?php $__currentLoopData = $partnerElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partnerElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-3 px-2">
                        <div class="partner-box" style="background-image: url('<?php echo e(getImage('assets/images/frontend/partner_slider/' . @$partnerElement->data_values->background_image)); ?>')">
                            <h6> <?php echo e($partnerElement->lang('title')); ?> </h6>
                            <img class="partner-img" src="<?php echo e(getImage('assets/images/frontend/partner_slider/' . @$partnerElement->data_values->logo)); ?>"
                                alt="">
                            <a href="javascript:void(0)" class="stretched-link"></a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<!--    partner section end-->



<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick-theme.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/web/js/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.partner_slider').slick({
            slidesToShow: 4,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            arrows: false,
            rtl: false,
            nextArrow: $('.next'),
            prevArrow: $('.prev'),
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]

        });
    </script>
<?php $__env->stopPush(); ?>



<?php $__env->startPush('style'); ?>
    <style>
        .partner-section .partner-box {
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-size: cover;
            background-position: center;
            display: block;
            width: 100%;
            height: 190px;
            position: relative;
            border-radius: 10px;
            overflow: hidden;


        }

        .partner-box h6 {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-weight: 700;
            font-size: 20px;
            line-height: 27px;
            width: 100%;
            text-align: center;
            color: #ffffff;
            transition: .2s;
        }

        .partner-box .partner-img {
            max-width: 180px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: .2s;
        }

        .partner-box:hover {
            background: #00A550;
        }

        .partner-box:hover h6 {
            opacity: 0;
        }

        .partner-box:hover .partner-img {
            opacity: 1;
        }

        .slider-width-control .slick-dots li{
    height: 10px;
    width: 10px;
    background: #999999;
    border-radius: 50%;
}

.slider-width-control .slick-dots li.slick-active{
    background: #00A550;
}
.slider-width-control .slick-dots{
    bottom: -60px;
}
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/partner_slider.blade.php ENDPATH**/ ?>