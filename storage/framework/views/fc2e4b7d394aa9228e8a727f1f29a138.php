<?php
    $evaluationSerivceElements = getContent('evaluation_service.element', null, false, true);
?>


<section class="py-5 aboutus border-top">
    <div class="container">
        <?php $__currentLoopData = $evaluationSerivceElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $evaluationSerivceElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key / 2 == 0): ?>
                <div class="py-5 row align-items-center">
                    <div class="col-md-6">
                        <img src="<?php echo e(getImage('assets/images/frontend/evaluation_service/' . @$evaluationSerivceElement->data_values->image, '615x385')); ?>"
                            class="w-100" alt="service">
                    </div>
                    <div class="col-md-6">
                        <h3 class="mt-3 text-dark mt-md-0"> <?php echo e(@$evaluationSerivceElement->lang('title')); ?>

                        </h3>
                        <p>
                            <?php echo @$evaluationSerivceElement->lang('description') ?>
                        </p>
                        <a href="<?php echo e(@$evaluationSerivceElement->data_values->service_request_url . '?type=Evaluation&title=' . @$evaluationSerivceElement->lang('title')); ?>"
                            class="apply-btn mt-md-4"> <?php echo app('translator')->get('Send Request'); ?> </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="py-5 row align-items-center">
                    <div class="order-1 col-md-6 order-md-0">
                        <h3 class="mt-3 text-dark mt-md-0"> <?php echo e(@$evaluationSerivceElement->lang('title')); ?> </h3>
                        <p>   <?php echo @$evaluationSerivceElement->lang('description') ?> </p>
                        <a href="<?php echo e(@$evaluationSerivceElement->data_values->service_request_url); ?>" class="apply-btn mt-md-4"> <?php echo app('translator')->get('Send Request'); ?> </a>
                    </div>
                    <div class="col-md-6 order-0 order-md-1">
                        <img src="<?php echo e(getImage('assets/images/frontend/evaluation_service/' . @$evaluationSerivceElement->data_values->image, '615x385')); ?>"
                            class="w-100" alt="service">
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/evaluation_service.blade.php ENDPATH**/ ?>