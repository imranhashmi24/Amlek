<?php
    $evaluationPlanElements = getContent('evaluation_plan.element', null, false, true);
?>


<section class="py-5">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $evaluationPlanElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evaluationPlanElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <div class="card custom-card">
                        <img src="<?php echo e(getImage('assets/images/frontend/evaluation_plan/' . @$evaluationPlanElement->data_values->image, '80x80')); ?>"
                            class="w-25 mt-2 mt-md-3 mx-auto" alt="Plan">
                        <div class="card-body">
                            <h5> <?php echo e(__(@$evaluationPlanElement->lang('title'))); ?> </h5>
                            <p>
                                <?php echo @$evaluationPlanElement->lang('description') ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/amlaek/public_html/resources/views/sections/evaluation_plan.blade.php ENDPATH**/ ?>