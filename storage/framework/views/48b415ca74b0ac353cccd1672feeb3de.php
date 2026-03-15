<?php $__env->startSection('content'); ?>
<section class="py-3">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $event_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="my-3 col-md-3 col-12 col-lg-3">
                <div class="news-card">
                    <div class="news-img">
                        <img src="<?php echo e(getImage(getFilePath('event_news') . '/' . $news->image, getFileSize('event_news'))); ?>" alt="" />
                    </div>
                    <div class="py-4 news-content">
                        <h3><?php echo e(app()->getLocale() == 'en' ? $news->title : $news->title_ar); ?></h3>
                        <p>
                            <?php if(app()->getLocale() == 'en'): ?>
                            <?php echo Str::limit($news->description, 100, '...'); ?>

                            <?php else: ?>
                            <?php echo Str::limit($news->description_ar, 100, '...'); ?>

                            <?php endif; ?>
                        </p>
                        <a href="<?php echo e(route('event.news.details', $news->slug)); ?>"><?php echo app('translator')->get('READ MORE'); ?></a>
                    </div>
                </div>
            </div>
            <?php if(app()->getLocale() == 'ar'): ?>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($event_news->hasPages()): ?>
        <div class="row">
            <div class="my-3 col-md-12">
                <?php echo e($event_news->links()); ?>

            </div>
        </div>
        <?php endif; ?>
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
    .property-image img {
        height: 200px !important;
    }

    .body-content {
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
    $('.flan-view').each(function() {
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });

    $(".clickType").click(function() {
        var type = $(this).val();
        $("#typeValue").val(type);
    });

    $('select').on('change', function(e) {
        e.preventDefault();

        const queryParams = new URLSearchParams();
        $('select').each(function() {
            queryParams.set($(this).attr('name'), $(this).val());
        });

        const url = '<?php echo e(route("eventFilter")); ?>?' + queryParams.toString();

        $.ajax({
            type: 'GET',
            url: url,
            success: function(res) {
                $("#showResult").html(res);
            }
        });
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Events'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/event_news.blade.php ENDPATH**/ ?>