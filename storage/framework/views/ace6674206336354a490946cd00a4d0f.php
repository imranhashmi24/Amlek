<?php
    $evaluationBannerContent = getContent('evaluation_banner.content', true);
?>


<section class="py-5 pages-banner"
    style="background-image: url(<?php echo e(getImage('assets/images/frontend/evaluation_banner/' . @$evaluationBannerContent->data_values->image, '1900x250')); ?>);">
    <div class="container">
        <div class="row">
            <div class="py-5 col-12">
                <h1 class="text-center"><?php echo e(@$evaluationBannerContent->lang('title')); ?></h1>
                <p class="text-center"><?php echo e(@$evaluationBannerContent->lang('description')); ?></p>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/evaluation_banner.blade.php ENDPATH**/ ?>