
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
<div class="overly-content">
    <p class="seconds">00</p>
    <p><?php echo app('translator')->get('Seconds'); ?></p>
</div>


<script>
    var countDownDate_<?php echo e($auction->id); ?> = new Date("<?php echo e($auction->beginning_time); ?>").getTime();
    var x_<?php echo e($auction->id); ?> = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate_<?php echo e($auction->id); ?> - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown_<?php echo e($auction->id); ?>").innerHTML =
            "<div class='overly-content'><p class='day'>" + days + "</p><p><?php echo app('translator')->get('Days'); ?></p></div>" +
            "<div class='overly-content'><p class='hour'>" + hours + "</p><p><?php echo app('translator')->get('Hours'); ?></p></div>" +
            "<div class='overly-content'><p class='minutes'>" + minutes + "</p><p><?php echo app('translator')->get('Minutes'); ?></p></div>" +
            "<div class='overly-content'><p class='seconds'>" + seconds + "</p><p><?php echo app('translator')->get('Seconds'); ?></p></div>";

        if (distance < 0) {
            clearInterval(x_<?php echo e($auction->id); ?>);
            document.getElementById("countdown_<?php echo e($auction->id); ?>").innerHTML = '<p class="expired"><?php echo e(__("EXPIRED")); ?></p>';
        }
    }, 1000);
</script>


<?php /**PATH E:\Alsari Office\Amlek\resources\views/web/pages/includes/__auction_time.blade.php ENDPATH**/ ?>