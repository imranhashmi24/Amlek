<?php
    $financeContent = getContent('finance_banner.content', true);
?>

<section class="py-5 pages-banner"
    style="background-image: url(<?php echo e(getImage('assets/images/frontend/finance_banner/' . @$financeContent->data_values->image, '1900x250')); ?>);">
    <div class="container">
        <div class="row">
            <div class="py-5 col-12">
                <h1 class="text-center"><?php echo e(@$financeContent->lang('title')); ?></h1>
                <p class="text-center"><?php echo e(@$financeContent->lang('description')); ?></p>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/finance_banner.blade.php ENDPATH**/ ?>