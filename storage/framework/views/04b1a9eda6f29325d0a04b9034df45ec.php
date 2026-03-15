<?php
    $marketingSerivceElements = getContent('marketing_service.element', null, false, true);
?>


<section class="py-5">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $marketingSerivceElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marketingSerivceElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-3 mb-md-5">
                    <div class="card custom-card">
                     <div class="card-body">
                        <img src="<?php echo e(getImage('assets/images/frontend/marketing_service/' . @$marketingSerivceElement->data_values->image, '270x210')); ?>"
                        alt="Marketing Image" class="w-100">
                    <h5 class="my-3 text-dark"> <?php echo e(@$marketingSerivceElement->lang('title')); ?> </h5>
                    <p class="text-muted">
                        <?php echo $marketingSerivceElement->lang('description'); ?>
                    </p>
                    <a href="<?php echo e(@$marketingSerivceElement->data_values->service_request_url); ?>" class="apply-btn">
                        <?php echo app('translator')->get('Request service'); ?>
                    </a>
                     </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/marketing_service.blade.php ENDPATH**/ ?>