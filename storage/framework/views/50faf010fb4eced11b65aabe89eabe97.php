<?php $__env->startSection('meta_tags'); ?>
    <meta name="title" Content="<?php echo e(gs('site_name')); ?> - <?php echo e($propertyRequest->name); ?>">
    <meta name="keywords" content="property">
    <link rel="shortcut icon" href="<?php echo e(siteFavicon()); ?>" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="<?php echo e(siteLogo()); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php echo e(gs('site_name')); ?> - <?php echo e($propertyRequest->name); ?>">

    
    <meta itemprop="name" content="<?php echo e(gs('site_name')); ?> - <?php echo e($propertyRequest->name); ?>">
    <meta itemprop="description" content="<?php echo e($propertyRequest->name); ?>">
    <meta itemprop="image" content="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $propertyRequest->thumb_image, getFileSize('property_thumb'))); ?>">

    
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e($propertyRequest->name); ?>">
    <meta property="og:description" content="<?php echo e($propertyRequest->name); ?>">
    <meta property="og:image" content="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $propertyRequest->thumb_image, getFileSize('property_thumb'))); ?>"/>
    <meta property="og:image:type" content="image/<?php echo e(getImage(getFilePath('property_thumb') . '/' . $propertyRequest->thumb_image, getFileSize('property_thumb'))); ?>" />
    <meta property="og:image:width" content="<?php echo e(getFileSize('property_thumb')); ?>" />
    <meta property="og:image:height" content="<?php echo e(getFileSize('property_thumb')); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">

    
    <meta name="twitter:card" content="summary_large_image">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <section class="py-5 property-details-main">
        <div class="container">
            <div class="row">
                <div class="mt-5 col-12 col-lg-6 col-xl-6">
                    <div class="property--details-gallery">
                        <div class="w-100">
                            <div class="first--image h-100 w-100">
                                <?php if(!empty($propertyRequest->thumb_image)): ?>
                                    <a href="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $propertyRequest->thumb_image, getFileSize('property_thumb'))); ?>"
                                        class="h-100">
                                        <img src="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $propertyRequest->thumb_image, getFileSize('property_thumb'))); ?>"
                                            alt="Image" class="w-100"></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 property--details">
                        <div class="">
                            <div>
                                <h4>
                                    <?php echo e(__($propertyRequest->purpose)); ?>

                                </h4>
                                <p class="mt-2 mb-0 property-type-property">
                                    <img src="<?php echo e(getImage(getFilePath('propertyType') . '/' . $propertyRequest->propertyType->icon, getFileSize('propertyType'))); ?>"
                                        alt="">
                                        <?php echo e(app()->getLocale() == 'en' ? @$propertyRequest->propertyType?->name : @$propertyRequest->propertyType?->name_ar); ?>



                                </p>
                            </div>
                            <div class="mt-4">
                                <p>
                                    <i class="bi bi-geo-alt"></i>
                                    <?php echo e(app()->getLocale() == 'en' ? $propertyRequest->country?->name : $propertyRequest->country?->name_ar); ?>, <?php echo e(app()->getLocale() == 'en' ? $propertyRequest->city?->name : $propertyRequest->city?->name_ar); ?>

                                </p>
                            </div>
                             <a href="<?php echo e(route('request.oportunity_form', ['t' =>$propertyRequest->name])); ?>" class="btn" style="background-color: #39004E !important; color: #FFF"><?php echo app('translator')->get('Request'); ?></a>
                               <a href="tel:+966551175959" class="btn btn-success m-2">
                            <i class="fab fa-whatsapp"></i>
                            <span><?php echo app('translator')->get('Whatsapp'); ?></span>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6">
                    <h5><?php echo e(__('Property Information')); ?> :</h5>
                    
                    <table class="table">
                        <tr>
                            <th><?php echo app('translator')->get('Request Name'); ?></th>
                            <td><?php echo e($propertyRequest->name); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('Country'); ?></th>
                            <td><?php echo e(app()->getLocale() == 'en' ? $propertyRequest->country?->name : $propertyRequest->country?->name_ar); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('City'); ?></th>
                            <td><?php echo e(app()->getLocale() == 'en' ? @$propertyRequest->city?->name : @$propertyRequest->city?->name_ar); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('Property Type'); ?></th>
                            <td><?php echo e(app()->getLocale() == 'en' ? @$propertyRequest->propertyType?->name : @$propertyRequest->propertyType?->name_ar); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('Sub Property Type'); ?></th>
                            <td><?php echo e(app()->getLocale() == 'en' ? @$propertyRequest->subPropertyType?->name : @$propertyRequest->subPropertyType?->name_ar); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('Nature Of Property'); ?></th>
                            <td><?php echo e(__($propertyRequest->nature_of_property)); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('Budget'); ?></th>
                            <td><?php echo e(__($propertyRequest->budget)); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('Purpose'); ?></th>
                            <td><?php echo e(__($propertyRequest->purpose)); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->get('Area'); ?></th>
                            <td><?php echo e(__($propertyRequest->area)); ?></td>
                        </tr>
                        
                    </table>
                    
                    
              
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        <?php if(app()->getLocale() == 'en'): ?>
            table tr td:last-child
            {
                text-align:left;
            }
        <?php else: ?>
        
            table tr td:last-child
            {
                text-align:right;
            }
        <?php endif; ?>
        
        .property--details-gallery img {
            width: 100%;
            object-fit: cover;
            height: 100%;
        }

        .property--details-gallery .first--image img {
            width: 100%;
            height: 300px;

        }

        .property--details-gallery .second--image a:first-child img {
            padding-bottom: 5px;
        }

        .property--details-gallery .second--image {
            position: relative;
        }

        .property--details-gallery .second--image span {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: hsl(var(--base)/0.8);
            display: inline-block;
            padding: 0px 10px;
            font-size: 14px;
            color: #ffffff;
        }

        @media only screen and (max-width: 1399px) {
            .property--details-gallery .first--image img {
                width: 450px;
            }
        }

        @media only screen and (max-width: 1199px) {
            .property--details-gallery .first--image img {
                width: 360px;
            }
        }

        @media only screen and (max-width: 991px) {
            .property--details-gallery .first--image img {
                width: 450px;
            }
        }

        @media only screen and (max-width: 768px) {
            .property--details-gallery .first--image img {
                width: 340px;
            }
        }

        .property--details-slider .slick-dots li {
            height: 5px;
            width: 5px;
            background: #000000;
            list-style: none;
            border-radius: 50%;
        }

        .property--details-slider .slick-dots li.slick-active {
            background: #cccccc;
        }

        .property--details-slider .slick-initialized .slick-slide {
            overflow: hidden;
            max-height: 100%;
        }

        .property--details-slider .slick-dotted.slick-slider {
            margin-bottom: 50px;
        }

        .slick-dots li button:before {
            display: none;
        }

        /* property */
        .property-details-right {
            padding: 15px;
            border: 1px solid #cccccc;
            border-radius: 10px;
        }

        .property-details-right .author-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .property-details-right .property2-contact .whatsapp {
            padding: 10px 10px;
            color: #03AD00;
        }

        .property-details-right .property2-contact .phone {
            padding: 10px 20px;
        }

        .property2-contact .whatsapp {
            border: 1px solid #03AD00;
            padding: 5px 10px;
            border-radius: 2px;
            font-weight: 600;
        }

        .property2-contact .phone {
            border: 1px solid #000000;
            padding: 5px 20px;
            border-radius: 2px;
            font-weight: 600;
            background: #000000;
            color: #ffffff;
        }

        .property2-contact .phone:hover {
            background: none;
            color: #000000;
        }

        .property-details-main .list-group {
            max-width: 500px;
        }

        .property-details-main .list-group .list-group-item {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
            background-color: #fafafa;
        }

        .list-group-item:first-child {
            border-top-left-radius: inherit;
            border-top-right-radius: inherit;
        }

        .property-details-main ul li {
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px dotted #000 !important;
        }

        .card-body .card-list {
            display: flex;
            padding: 8px;
            flex-wrap: nowrap;
            border-bottom: 1px solid #cccccc;
            justify-content: space-between;

        }

        .card-body .card-list:last-child {
            border-bottom: none;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick-theme.css')); ?>">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/web/js/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.property--details-gallery').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });


        $(".property--details-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1800,
            dots: true,
            arrows: false,
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Property Request Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/request_property_details.blade.php ENDPATH**/ ?>