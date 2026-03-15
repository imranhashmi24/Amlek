<?php
    $bannerElements = getContent('banner.element', null, false, true);
?>

<section class="py-3 py-lg-5">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $__currentLoopData = @$bannerElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bannerElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item  <?php echo e($key == 0 ? 'active' : ''); ?>">
                    <img src="<?php echo e(getImage('assets/images/frontend/banner/' . @$bannerElement->lang('slider'), '1350x360')); ?>"
                        class="d-block w-100 slider-height img-fluid" alt="Slider Image">
                        
                    <!--<div class="container" id="sliderHandle">-->
                    <!--    <div class="carousel-caption">-->
                    <!--        <div class="home-banner-text">-->
                    <!--            <h1><?php echo e(@$bannerElement->lang('title')); ?></h1>-->
                    <!--            <p class="highlight-text"><?php echo e(@$bannerElement->lang('sub_title')); ?></p>-->
                    <!--            <a href="<?php echo e(@$bannerElement->lang('button_links')); ?>" class="btn get-start-btn"><?php echo e(@$bannerElement->lang('button_text')); ?></a>-->
                    <!--        </div>-->
                    <!--   </div>-->
                    <!--</div>-->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>


<?php $__env->startPush('style'); ?>
<style>

    .home-banner-text {
        padding-top: 60px;
        align-items: center;
        justify-content: center; 
        text-align: start;
        width: 600px;
        height: 100%; 
    }

    .home-banner-text h1 {
        font-size: 40px;
        font-weight: 600;
        line-height: 50px;
        margin-bottom: 20px;
        color: #fff;
    }

    .home-banner-text p {
        font-size: 18px;
        font-weight: 400;
        line-height: 30px;
        color: #fff;
        margin-bottom: 20px;
        width: 250px;
    }

    .home-banner-text p.highlight-text::first-line{
        color: red;
        font-size: 20px;
    }

    .home-banner-text .get-start-btn {
        background: transparent;
        color: var(--theme-color);
        border: 1px solid var(--theme-color);
        padding: 10px 30px;
        border-radius: 5px;
        transition: .3s;
        text-decoration: none;
    }

    @media (max-width: 767px) {
        
        .slider-height{
            background-size:cover;
            background-position:cover;
        }
        
        .home-banner-text {
            padding-top: 5px;
            align-items: center;
            justify-content: center; 
            text-align: start;
            margin: 0 !important;
        }


        .home-banner-text h1 {
            font-size: 16px;
            line-height: 20px;
            width: 300px;
        }

        .home-banner-text p {
            font-size: 12px;
            line-height: 15px;
            width: 150px;
        }
        
         .home-banner-text p.highlight-text::first-line{
            color: red;
            font-size: 14px;
        }

       .home-banner-text .get-start-btn {
            padding: 3px 10px;
            font-size: 12px;
        }

    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function() {
        function checkWidth() {
            if ($(window).width() <= 768) {
                $("#sliderHandle").removeClass("container");
            } else {
                $("#sliderHandle").addClass("container");
            }
        }

        checkWidth();

        $(window).resize(function() {
            checkWidth();
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php /**PATH E:\Alsari Office\Amlek\resources\views/sections/banner.blade.php ENDPATH**/ ?>