<?php
    $serviceContent = getContent('service_section.content', true);
    $serviceElements = getContent('service_section.element', null, false, true);
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center page-title">
                    <h3 class="pb-4 text-dark"> <?php echo e(@$serviceContent->lang('heading')); ?> </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $serviceElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-4 mb-md-5">
                    <div class="card custom-card">
                        <div class="card-body">
                            <img src="<?php echo e(getImage('assets/images/frontend/service_section/' . @$serviceElement->data_values->image, '380x235')); ?>"
                                alt="service" class="w-100">
                            <h5 class="my-3 text-dark"> <?php echo e(@$serviceElement->lang('title')); ?> </h5>
                            <div style="font-size: 12px !important" class="my-2"> <?php echo @$serviceElement->lang('short_description') ?> </div>
                     
                            <a href="<?php echo e($serviceElement->data_values->button_url . '?type=about&title=' . @$serviceElement->lang('title')); ?>" class="apply-btn">
                                <?php echo app('translator')->get('Request service'); ?>
                            </a>


                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<?php $__env->startPush('style'); ?>
<style>
    .MsoNormal span{
        font-size: 12px !important;
    }
</style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/amlaek/public_html/resources/views/sections/service_section.blade.php ENDPATH**/ ?>