<?php $__env->startSection('content'); ?>
<section class="py-5">
    <div class="container">
        <?php echo $__env->make('web.pages.includes.__auction_nav_detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <hr>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card round-card">
                    <img src="<?php echo e(getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb'))); ?>" alt="">
                </div>
                <div class="py-4 d-flex justify-content-between">
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
                    <div>
                        <button type="button" class="love-btn "  data-type="auction" data-item="<?php echo e($auction->id); ?>">
                            <i class="fa fa-share"></i>
                        </button>
                        <button type="button" class="love-btn react"  data-type="auction" data-item="<?php echo e($auction->id); ?>">
                            <i class="fa fa-heart <?php echo e(findMyFvt('auction', $auction->id) ? 'text-danger' : ''); ?>"></i>
                        </button>
                    </div>
                </div>

                <div class="time-count" id="countdown_<?php echo e($auction->id); ?>">
                    <?php echo $__env->make('web.pages.includes.__auction_time', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="auction-info">
                    <div class="info-content" id="day-info">
                        <i class="fas fa-calendar-day"></i>
                        <p class="day"><?php echo e(@$auction->auction_day); ?></p>
                        <p><?php echo app('translator')->get('Auction Days'); ?></p>
                    </div>
                    <div class="info-content" id="date-info">
                        <i class="fas fa-calendar-alt"></i>
                        <p class="hour"><?php echo e(showDateTime($auction->beginning_time, 'd/m/Y')); ?></p>
                        <p><?php echo app('translator')->get('Auction Date'); ?></p>
                    </div>
                    <div class="info-content" id="time-info">
                        <i class="fas fa-clock"></i>
                        <p class="minutes"><?php echo e(showDateTime($auction->beginning_time, 'h:i A')); ?></p>
                        <p><?php echo app('translator')->get('Beginning time'); ?></p>
                    </div>
                    <div class="info-content" id="item-info">
                        <i class="fas fa-gavel"></i>
                        <p class="seconds"><?php echo e(count($auction->properties)); ?></p>
                        <p><?php echo app('translator')->get('Auction Items'); ?></p>
                    </div>
                </div>

                <?php if(!empty($auction->document)): ?>
                <div class="download-pdf">
                    <div class="download-content">
                        <i class="fas fa-download"></i>
                        <a href="<?php echo e($auction->document); ?>" download><?php echo app('translator')->get('Download'); ?></a>
                    </div>
                    <div class="download-content">
                        <p><?php echo e($auction->document); ?></p>
                        <i class="fas fa-file-pdf"></i>
                    </div>
                </div>
                <?php endif; ?>

                <div class="my-4 register-btn">
                    <a href="#" class="btn btn-dark"><?php echo app('translator')->get('Registration for the Auction'); ?></a>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <?php echo $__env->make('web.pages.includes.__auction_profile_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</section>

<?php if(@$sections->secs != null): ?>
    <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.pages.includes.__auction_common_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('web.component.__js_fvt_react', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/auction_details_about.blade.php ENDPATH**/ ?>