<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('sections.breadcrumb',['title' => 'Rehabilitation Eempowerment'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;


    <?php if(@$sections->secs != null): ?>
        <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Rehabilitation Eempowerment'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/rehabilitation_empowerment.blade.php ENDPATH**/ ?>