<?php $__env->startSection('content'); ?>
<section class="py-5 pages-banner">
    <div class="container">
        <div class="py-3 row">
            <div class="col-md-6">
                <div class="text-dark">
                    <h3>
                        <?php echo e(app()->getLocale() == 'en' ? $event->title : $event->title_ar); ?>

                    </h3>
                    <p><?php echo app('translator')->get('SD'); ?> <?php echo e(showDateTime($event->start_time, 'd-m-Y')); ?> - <?php echo app('translator')->get('ED'); ?> <?php echo e(showDateTime($event->end_time, 'd-m-Y')); ?></p>

                </div>
            </div>
            <div class="col-md-6">
                <div class="text-white event-time" style="background-color: rgba(255, 111, 5, 1)" id="countdown_<?php echo e($event->id); ?>">
                    <div class="overly-content">
                        <p class="text-white day">00</p>
                        <p class="text-white"><?php echo app('translator')->get('Days'); ?></p>
                    </div>
                    <div class="overly-content">
                        <p class="text-white hour">00</p>
                        <p class="text-white"><?php echo app('translator')->get('Hours'); ?></p>
                    </div>
                    <div class="overly-content">
                        <p class="text-white minutes">00</p>
                        <p class="!text-white"><?php echo app('translator')->get('Minutes'); ?></p>
                    </div>
                </div>

                <script>
                    var countDownDate_<?php echo e($event->id); ?> = new Date("<?php echo e($event->end_time); ?>").getTime();
                    var x_<?php echo e($event->id); ?> = setInterval(function() {
                        var now = new Date().getTime();
                        var distance = countDownDate_<?php echo e($event->id); ?> - now;
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        document.getElementById("countdown_<?php echo e($event->id); ?>").innerHTML =
                            "<div class='overly-content'><p class='day'>" + days + "</p><p><?php echo app('translator')->get('Days'); ?></p></div>" +
                            "<div class='overly-content'><p class='hour'>" + hours + "</p><p><?php echo app('translator')->get('Hours'); ?></p></div>" +
                            "<div class='overly-content'><p class='minutes'>" + minutes + "</p><p><?php echo app('translator')->get('Minutes'); ?></p></div>";

                        if (distance < 0) {
                            clearInterval(x_<?php echo e($event->id); ?>);
                            document.getElementById("countdown_<?php echo e($event->id); ?>").innerHTML = '<p class="expired"><?php echo e(__("EXPIRED")); ?></p>';
                        }
                    }, 1000);
                </script>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="py-3 event-detail-card">
                    <img src="<?php echo e(getImage(getFilePath('events') . '/' . $event->image, getFileSize('events'))); ?>" alt="">
                </div>
            </div>
        </div>

        <div class="py-3 row">
            <div class="col-12 col-md-12 col-lg-12">
                <h3 class="text-dark"><?php echo app('translator')->get('Event details'); ?></h3>
            </div>

            <div class="py-3 col-12 col-md-12 col-lg-12">
              <div style="color:black">
                <?php if(app()->getLocale() == 'en'): ?>
                    <p class="text-dark"><?php echo $event->description; ?></p>
                <?php else: ?>
                    <p  class="text-dark"><?php echo $event->description_ar; ?></p>
                <?php endif; ?>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <h3 class="text-dark"><?php echo app('translator')->get('Event Information'); ?></h3>
            </div>
            <div class="my-5 col-12 col-md-12 col-lg-12">
                <div class="info-card">
                    <div class="row">
                        <div class="col-3 col-md-4 col-lg-4">
                            <b><?php echo app('translator')->get('Event Type'); ?></b>
                        </div>
                        <div class="col-9 col-md-8 col-lg-8">
                            <p><?php echo e(__($event->type)); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 col-md-4 col-lg-4">
                            <b><?php echo app('translator')->get('Time'); ?></b>
                        </div>
                        <div class="col-9 col-md-8 col-lg-8">
                            <p><?php echo app('translator')->get('SD'); ?> <?php echo e(showDateTime($event->start_time, 'd-m-Y')); ?> - <?php echo app('translator')->get('ED'); ?> <?php echo e(showDateTime($event->end_time, 'd-m-Y')); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 col-md-4 col-lg-4">
                            <b><?php echo app('translator')->get('Audience Type'); ?></b>
                        </div>
                        <div class="col-9 col-md-8 col-lg-8">
                            <p><?php echo e(__($event->audience_type)); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 col-md-4 col-lg-4">
                            <b><?php echo app('translator')->get('Sector'); ?></b>
                        </div>
                        <div class="col-9 col-md-8 col-lg-8">
                            <p><?php echo e(__($event->sector)); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 col-md-4 col-lg-4">
                            <b><?php echo app('translator')->get('Location'); ?></b>
                        </div>
                        <div class="col-9 col-md-8 col-lg-8">
                            <p><?php echo e($event->address); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-2">
    <div class="container">
        <div class="mb-5 row">
            <div class="col-12 col-md-12">
                <h3 class="mb-5 text-center"><?php echo app('translator')->get('Have any ask?'); ?></h3>
            </div>
            <div class="col-md-12">
                <div class="any-ask-card">
                    <form action="<?php echo e(route('event.ask.form_submit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="event_id" value="<?php echo e($event->id); ?>">
                        <div class="my-3 row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <label for="" class="form-label"><?php echo app('translator')->get('Name'); ?> <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control c-form-control" placeholder="<?php echo app('translator')->get('Type name'); ?>">
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <label for="" class="form-label"><?php echo app('translator')->get('Phone'); ?> <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control c-form-control" placeholder="<?php echo app('translator')->get('Type phone'); ?>">
                            </div>
                        </div>
                        <div class="my-3 row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <label for="" class="form-label"><?php echo app('translator')->get('Email'); ?> <span class="text-danger">*</span></label>
                                <input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control c-form-control" placeholder="<?php echo app('translator')->get('Type email'); ?>">
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <label for="" class="form-label"><?php echo app('translator')->get('City'); ?> <span class="text-danger">*</span></label>
                                <input type="text" name="city" value="<?php echo e(old('city')); ?>" class="form-control c-form-control" placeholder="<?php echo app('translator')->get('Type city'); ?>">
                            </div>
                        </div>
                        <div class="my-3 row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <label for="" class="form-label"><?php echo app('translator')->get('Type your asking'); ?> <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control c-form-control" placeholder="<?php echo app('translator')->get('Type message'); ?>"><?php echo e(old('message')); ?></textarea>
                            </div>
                        </div>

                        <div class="my-3 row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="view-btn">
                                    <?php echo app('translator')->get('Get Started'); ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
    $('.flan-view').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                  delegate: 'a', // the selector for gallery item
                  type: 'image'
                  , gallery: {
                        enabled: true
                  }
            });
      });

      $(".clickType").click(function() {
            var type = $(this).val();
            $("#typeValue").val(type);
      });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Events'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/event_details.blade.php ENDPATH**/ ?>