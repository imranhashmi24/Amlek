<?php
    $promotionElements = getContent('promotion.element', null, false, true);
    $countries = App\Models\Country::with('city')->get();
?>

<section class="py-3 py-lg-5">
    <div class="container">
        <div class="gap-3 d-flex align-itmes-center">
            <div>
                <h5 class="py-3 pt-3 m-0 fs-3"><?php echo e(__('Requests')); ?></h5>
            </div>
        </div>
        <div class="promo_slider service-slider">
            <?php $__currentLoopData = $promotionElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotionElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mx-1">
                    <a href="<?php echo e(route('promotion.request',$promotionElement->id)); ?>">
                       <div class="p-2">
                            <div class="service-slider-box-plain">
                                <img src="<?php echo e(getImage('assets/images/frontend/promotion/' . @$promotionElement->data_values->image)); ?>"
                                    alt="" />
                                <div class="overlay-service-plain">
                                    <h5 class="px-2"><?php echo Str::limit(@$promotionElement->lang('short_description'), 30, '...'); ?></h5>
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


        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = '<option value=""><?php echo app('translator')->get('Select one'); ?></option>';
            $.each(cities, function(index, value) {

                var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;

                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") +
                    "data-lat='" + value.lat + "' data-lng='" + value.lng + "'>" +
                    name + "</option>";
            });

            $('select[name=city_id]').html(option);
        }).change();


        $(".promo_slider").slick({
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
<?php /**PATH D:\soudi-project\Amlek\resources\views/sections/promotion.blade.php ENDPATH**/ ?>