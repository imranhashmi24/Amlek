<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/propertryslider.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('meta_tags'); ?>
    <meta name="title" Content="<?php echo e(gs('site_name')); ?> - <?php echo e($property->lang('title')); ?>">
    <meta name="description" content="<?php echo e($property->lang('description')); ?>">
    <meta name="keywords" content="property">
    <link rel="shortcut icon" href="<?php echo e(siteFavicon()); ?>" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="<?php echo e(siteLogo()); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php echo e(gs('site_name')); ?> - <?php echo e($property->lang('title')); ?>">

    
    <meta itemprop="name" content="<?php echo e(gs('site_name')); ?> - <?php echo e($property->lang('title')); ?>">
    <meta itemprop="description" content="<?php echo e($property->lang('description')); ?>">
    <meta itemprop="image" content="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>">

    
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e($property->lang('title')); ?>">
    <meta property="og:description" content="<?php echo e($property->lang('description')); ?>">
    <meta property="og:image" content="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>"/>
    <meta property="og:image:type" content="image/<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>" />
    <meta property="og:image:width" content="<?php echo e(getFileSize('property_thumb')); ?>" />
    <meta property="og:image:height" content="<?php echo e(getFileSize('property_thumb')); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">

    
    <meta name="twitter:card" content="summary_large_image">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <section class="py-5 property-details-main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="property--details-gallery d-none d-sm-flex">
                        <div class="w-100">
                            <div class="first--image h-100">
                                <?php if(!empty($property->thumb_image)): ?>
                                    <a href="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>"
                                        class="h-100">
                                        <img src="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>"
                                            alt="Image"></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="flex-shrink-1 second--image">
                            <?php if(!empty($propertyImages)): ?>
                                <?php $__currentLoopData = $propertyImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(getImage(getFilePath('property') . '/' . $image->image, getFileSize('property'))); ?>"
                                        class="h-50 ms-2 w-100 <?php echo e($key > 1 ? 'd-none' : ''); ?>">
                                        <img src="<?php echo e(getImage(getFilePath('property') . '/' . $image->image, getFileSize('property'))); ?>"
                                            alt="Image"></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <span> <i class="bi bi-camera"></i> <?php echo e($propertyImages->count() + 1); ?> </span>
                        </div>
                    </div>

                    <div class="property--details-slider d-sm-none">
                        <?php if(!empty($property->thumb_image)): ?>
                            <img src="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>"
                                alt="Image">
                        <?php endif; ?>
                        <?php if(!empty($propertyImages)): ?>
                            <?php $__currentLoopData = $propertyImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(getImage(getFilePath('property') . '/' . $image->image, getFileSize('property'))); ?>"
                                    alt="Image">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>


                    <div class="mt-4 property--details">
                        <div class="flex-wrap property--title d-flex justify-content-between">
                            <div>
                                <h4>
                                    <?php echo e($property->lang('title')); ?>

                                </h4>
                                <p class="mt-2 mb-0 property-type-property">
                                    <img src="<?php echo e(getImage(getFilePath('propertyType') . '/' . $property->propertyType->icon, getFileSize('propertyType'))); ?>"
                                        alt="">
                                    <?php echo e(@$property->propertyType->lang('name')); ?>


                                </p>
                            </div>
                            <div>
                                <p>
                                    <i class="bi bi-geo-alt"></i>
                                    <?php echo e($property->country->lang('name')); ?>,
                                    <?php echo e($property->city->lang('name')); ?>

                                </p>
                            </div>

                            <div>
                                <a href=""  data-bs-toggle="modal"
                                data-bs-target="#propertyRequestForm" class="btn" style="background-color: #39004E !important; color: #FFF"> <?php echo app('translator')->get('Request'); ?> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-3 col-12 col-lg-5 col-xl-4 mt-lg-0">
                    <div class="property-details-right wow fadeInUp" data-wow-duration="1s">
                        <h4> <?php echo e($property->price ?? ''); ?> <?php echo e(__('SAR')); ?>/<?php echo e(__('month')); ?></h4>
                        <span class="author"><?php echo e(__('Authorized Broker')); ?></span>
                        <div class="gap-3 mt-3 author-profile d-flex">
                            <div>
                                <img src="<?php echo e(asset('assets/images')); ?>/default.png">
                            </div>
                            <div>
                                <span><?php echo e(__('Listed by')); ?></span>
                                <h5>
                                    <?php if(!empty($property->user)): ?>
                                        <?php echo e($property->user->name); ?>

                                    <?php else: ?>
                                      <?php echo e(__('Admin')); ?>

                                    <?php endif; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="gap-2 mt-4 d-flex property2-contact">
                            <a href="https://wa.me/966551175959" class="text-center whatsapp w-100">
                                <i class="bi bi-whatsapp"></i>
                                <span><?php echo e(__('Whatsapp')); ?></span>
                            </a>
                            <a href="tel:+966550217734" class="text-center phone w-100">
                                <i class="bi bi-telephone-fill"></i>
                                <span><?php echo e(__('Call us')); ?></span>
                            </a>
                        </div>
                    </div>

                    <div>
                        <?php echo $__env->make('web.component.map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>


                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="mt-5">
                        <h5><?php echo e(__('Property Information')); ?> :</h5>
                        <div class="border shadow-none card">
                            <div class="p-0">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th><?php echo app('translator')->get('Title'); ?></th>
                                            <td><?php echo e($property->lang('title')); ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo app('translator')->get('Property Type'); ?></th>
                                            <td><?php echo e($property->propertyType->lang('name')); ?></td>
                                        </tr>
                                        <tr>
                                            <th><?php echo app('translator')->get('Property Type'); ?></th>
                                            <td><?php echo e(@$property->subPropertyType->lang('name')); ?></td>
                                        </tr>
                                        <tr>
                                            <th> <?php echo app('translator')->get('Construction Type'); ?></th>
                                            <td><?php echo e(__($property->construction_type)); ?></td>
                                        </tr>
                                        <tr>
                                            <th> <?php echo app('translator')->get('Type'); ?></th>
                                            <td><?php echo e(__($property->purpose)); ?></td>
                                        </tr>


                                <?php $__currentLoopData = $property->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th> <?php echo app('translator')->get(keyToTitle($detail->field)); ?></th>
                                            <td><?php echo e(__($detail->val)); ?></td>
                                        </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo app('translator')->get('Price'); ?></th>
                                    <td><?php echo e($property->price); ?> <?php echo e(gs('cur_sym')); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('Sqr Price'); ?></th>
                                    <td><?php echo e($property->sqr_price); ?> <?php echo e(gs('cur_sym')); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('Reference no'); ?></th>
                                    <td><?php echo e($property->reference_no); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('Ad license number'); ?></th>
                                    <td><?php echo e($property->ad_license_number); ?></td>
                                </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h5><?php echo e(__('Location Information')); ?> :</h5>
                        <div class="border shadow-none card">
                            <table class="p-0 table">
                                <tbody>
                                <tr>
                                    <th><?php echo app('translator')->get('Country'); ?></th>
                                    <td> <?php echo e($property->country->lang('name')); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('City'); ?></th>
                                    <td> <?php echo e($property->city->lang('name')); ?> </td>
                                </tr>
                                <tr>
                                    <th><?php echo app('translator')->get('Features'); ?></th>
                                    <td><?php echo e($property->lang('features')); ?></td>
                                </tr>

                                <tr>
                                  <td colspan="2">

                                    <?php echo $property->lang('description') ?>
                                    </td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('web.component.property_request_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            width: 570px;
            height: 100%;

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

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Property Detail'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/pages/property_detail.blade.php ENDPATH**/ ?>