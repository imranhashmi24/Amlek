<?php if($events): ?>
<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="my-2 col-12 col-md-6 col-lg-6">
    <div class="p-4 event-card-2 d-flex justify-content-between">
        <div class="img">
            <img src="<?php echo e(getImage(getFilePath('events') . '/' . $event->image, getFileSize('events'))); ?>" alt="">
        </div>
        <div class="px-4 event-card-2-content">
            <h3> <a href="<?php echo e(route('event.details', $current_event->slug)); ?>">
                <?php echo e(app()->getLocale() == 'en' ? $event->title : $event->title_ar); ?>

            </a></h3>
            <p><?php echo app('translator')->get('SD'); ?> <?php echo e(showDateTime($event->start_time, 'd-m-Y')); ?> - <?php echo app('translator')->get('ED'); ?> <?php echo e(showDateTime($event->end_time, 'd-m-Y')); ?></p>

            <div class="event-time" id="countdown_<?php echo e($event->id); ?>">
                <div class="overly-content">
                    <p class="day">00</p>
                    <p><?php echo app('translator')->get('Days'); ?></p>
                </div>
                <div class="overly-content">
                    <p class="hour">00</p>
                    <p><?php echo app('translator')->get('Hours'); ?></p>
                </div>
                <div class="overly-content">
                    <p class="minutes">00</p>
                    <p><?php echo app('translator')->get('Minutes'); ?></p>
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
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/amlaek/public_html/resources/views/web/pages/includes/__event_filter.blade.php ENDPATH**/ ?>