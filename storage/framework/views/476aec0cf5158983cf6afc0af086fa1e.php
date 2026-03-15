<?php $__env->startSection('content'); ?>
<section class="py-5 property property-bg-color">
    <div class="container">
       <?php echo $__env->make('web.pages.includes.__auction_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <hr>

        <div class="py-3 row">
            <?php $__currentLoopData = $auctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="my-3 col-md-4">
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
                        <p><?php echo app('translator')->get('Start on'); ?>:  <?php echo e(showDateTime($auction->beginning_time, 'l h:i A')); ?></p>
                        <p><?php echo app('translator')->get('Duration'); ?>: <?php echo e($auction->auction_day); ?> <?php echo app('translator')->get('Days'); ?></p>
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
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>

<?php if(@$sections->secs != null): ?>
    <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/custom.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
<style>


.property-image img{
        height: 200px !important;
    }
    .body-content{
        margin-bottom: 7px !important;
        height: 150px !important;
        overflow: hidden;
    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/web/js/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.flan-view').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });

        $(".clickType").click(function(){
            var type = $(this).val();
            $("#typeValue").val(type);
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('web.component.__js_fvt_react', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Auctions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/auctions.blade.php ENDPATH**/ ?>