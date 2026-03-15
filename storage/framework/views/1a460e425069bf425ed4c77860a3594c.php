<?php $__env->startSection('meta_tags'); ?>
    <?php if(app()->getLocale() == 'en'): ?>
    <meta name="locale" content="<?php echo e(app()->getLocale()); ?>" />
    <link rel="canonical" href="https://amlaek.com/" />
    <meta property="og:locale" content="en"/>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Amlaek" />
    <meta property="og:description" content="Amlaek for Real Estate Services" />
    <meta property="og:keyword" content="Properties, Amlaek,Real estate investment,Properties for sale,Properties for purchase,Real estate development,Design and development,Real Estate Management,Real estate valuation,Real estate consultancy,Real estate rehabilitation,real estate market,Real estate financing,Real estate projects" />
    <meta property="og:url" content="https://amlaek.com"/>
	<meta property=" og:site_name" content="Amlaek   " />
    <meta property="article:author" content="Muhammad Al Sari" />
    <meta property="article:published_time" content="2024-05-15T15:31:38+00:00" />
    <meta property="article:modified_time" content="2024-05-15T15:32:33+00:00" />
    <meta property="og:image" content="<?php echo e(siteLogo()); ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="853" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@#" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="خليل النمازي" />
    <?php else: ?>
    <meta name="locale" content="<?php echo e(app()->getLocale()); ?>" />
    <link rel="canonical" href="https://amlaek.com/" />
    <meta property="og:locale" content="ar" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="تنمية الأملاك" />
    <meta property="og:description" content="تنمية الاملاك للخدمات العقارية" />
    <meta property="og:keyword" content="تنمية الأملاك,استثمار عقاري,عقارات للبيع,عقارات للشراء,تطوير العقارات,تصميم وتطوير,إدارة العقارات,تقييم العقارات,استشارات عقارية,إعادة التأهيل العقاري,سوق العقارات" />
    <meta property="og:url" content="https://amlaek.com"/>
	<meta property=" og:site_name" content="" />
    <meta property="article:author" content="لمستشار  محمد آل ساري "/>
    <meta property="article:published_time" content="2024-05-15T15:31:38+00:00" />
    <meta property="article:modified_time" content="2024-05-15T15:32:33+00:00" />
    <meta property="og:image" content="<?php echo e(siteLogo()); ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="853" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@#" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="خليل النمازي" />
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('sections.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.property_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.ai_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.promotion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.offer_banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.property_request_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.auction_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.floor_plan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
   
    

    <div class="container py-3 py-lg-3">
        <div class="row">
            <div class="col-10">
                <h3 class="text-left text-dark">
                    <?php echo app('translator')->get('Search according to sectors'); ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="container py-3 py-lg-5">
        <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-4">
                <div class="gap-3 propertyTyper-header d-flex align-itmes-center">
                    <div>
                        <img src="<?php echo e(getImage(getFilePath('propertyType') . '/' . $propertyType->icon, getFileSize('propertyType'))); ?>"
                            alt="">
                    </div>
                    <div>
                        <h5 class="pt-3 m-0"><?php echo e($propertyType->lang('name')); ?></h5>
                    </div>
                </div>

                <div class="mt-4 row property-type-area-slider">
                    <?php $__currentLoopData = $propertyType->property_type_cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property_type_city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="pb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="property-type-area">
                                <a
                                    href="<?php echo e(route('property', ['tab' => 'list','property_type' => $propertyType->id, 'city_id' => $property_type_city->city->id])); ?>">
                                    <img src="<?php echo e(getImage(getFilePath('propertyTypeArea') . '/' . $property_type_city->image, getFileSize('propertyTypeArea'))); ?>"
                                        alt="Image" class="rounded">

                                    <div class="type-area-overlay">
                                        <i class="fa-regular fa-map"></i>
                                        <span> <?php echo e($property_type_city->city->lang('name')); ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="container py-3 py-lg-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center text-dark">
                    <?php echo app('translator')->get('Blogs'); ?>
                </h3>
            </div>
        </div>
    </div>

    <?php if(@$sections->secs != null): ?>
        <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>


    <?php echo $__env->make('sections.advance_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick-theme.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/web/js/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(window).on('resize', function(event) {
            let width = $(document).width()

            if (width < 576) {
                $(".property-type-area-slider").slick({
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    speed: 1800,
                    dots: false,
                    arrows: false,
                    <?php if(session()->get('lang') == 'ar'): ?>
                        rtl: true,
                    <?php endif; ?>
                });
            }
        });

        if ($(window).width() < 576) {
            $(".property-type-area-slider").slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: true,
                autoplaySpeed: 3000,
                speed: 1800,
                dots: true,
                arrows: false,
                <?php if(session()->get('lang') == 'ar'): ?>
                    rtl: true,
                <?php endif; ?>
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => __('Amlaek for Real Estate Services')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/home.blade.php ENDPATH**/ ?>