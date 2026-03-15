<?php
    $breadcrumbContent = getContent('breadcrumb.content', true);
?>


<section class="py-5 pages-banner" style="background-image: url(<?php echo e(getImage('assets/images/frontend/breadcrumb/' . @$breadcrumbContent->data_values->image, '1900x250')); ?>);">
    <div class="container">
        <div class="row">
            <div class="py-5 col-12">
                <h1 class="p-0 m-0 text-center"> <?php echo __(@$title); ?></h1>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/breadcrumb.blade.php ENDPATH**/ ?>