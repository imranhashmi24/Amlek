<?php
    $investmentContent = getContent('social_investment_service.content', true);
    $investmentElements = getContent('social_investment_service.element', null, false, true);
?>

<section class="py-5">
    <div class="container">
        <div class="intro-content">
            <div class="intru-text">
                <div class="intro-details">
                    <div class="row">
                        <div class="col-12 pb-md-5">
                            <h4>
                                <?php echo @$investmentContent->lang('short_description'); ?>

                            </h4>
                        </div>
                    </div>
                    <?php if(!blank(@$investmentElements)): ?>
                    <div class="row">
                        <?php $__currentLoopData = $investmentElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investmentElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6">
                                <div class="details-text">
                                    <p>
                                        <?php echo e(@$investmentElement->lang('title')); ?>

                                    </p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/amlaek/public_html/resources/views/sections/social_investment_service.blade.php ENDPATH**/ ?>