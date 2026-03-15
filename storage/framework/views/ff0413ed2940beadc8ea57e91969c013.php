<?php
    $addPropertyContent = getContent('add_property.content', true);
?>

<section class="py-5 add-property-section"
    style="background-image: linear-gradient(#00000030, #00000030), url(<?php echo e(getImage('assets/images/frontend/add_property/' . @$addPropertyContent->data_values->image, '1440x360')); ?>);background-size:100% 100%;">

    <div class="container my-5">
        <div class="row">
            <div class="px-5 text-center col-12 col-md-12">
                <h2> <?php echo e(__(@$addPropertyContent->lang('title'))); ?> </h2>
                <p> <?php echo __(@$addPropertyContent->lang('description')); ?> </p>
                <a href="<?php echo e(@$addPropertyContent->data_values->button_url); ?>" class="mt-4 submit-btn">
                    <?php echo e(__(@$addPropertyContent->lang('button_text'))); ?> </a>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('style'); ?>
<style>
    .add-property-section h2{
        font-size: 40px;
        color: #ffffff;
        margin-bottom: 20px;
    }
    .add-property-section p{
        font-size: 18px;
        color: #ffffff;
        max-width: 900px;
        margin: 0 auto;
        padding: 10px 0;
        line-height: 35px;
    }
</style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/add_property.blade.php ENDPATH**/ ?>