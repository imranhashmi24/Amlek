<?php
    $marketingBannerContent = getContent('marketing_banner.content', true);
?>


<section class="py-5 pages-banner" style="background-image: url(<?php echo e(getImage('assets/images/frontend/marketing_banner/' . @$marketingBannerContent->data_values->image, '1900x250')); ?>);">
    <div class="container">
        <div class="row">

            <!--<?php if(app()->getLocale() == 'ar'): ?>-->
            <!--    <div class="py-5 col-6"></div>-->
            <!--<?php endif; ?>-->

            
            <div class="py-5 col-12">
                <h1 class="text-center"><?php echo __(@$marketingBannerContent->lang('title')); ?></h1>
                <p class="text-center"><?php echo __(@$marketingBannerContent->lang('description')); ?></p>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/marketing_banner.blade.php ENDPATH**/ ?>