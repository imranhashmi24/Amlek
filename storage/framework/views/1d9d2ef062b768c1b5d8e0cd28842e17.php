

<?php
    $aboutSectionContent = getContent('about_section.content', true);
?>

<section class="py-5 aboutus border-top">
    <div class="container">
        <div class="row no-gutters position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
                <img src="<?php echo e(getImage('assets/images/frontend/about_section/' . @$aboutSectionContent->data_values->image, '615x340')); ?>" class="w-100" alt="about">
            </div>
            <div class="p-4 col-md-6 position-static pl-md-0">
                <h3 class="mt-5 text-dark"> <?php echo e($aboutSectionContent->lang('title')); ?> </h3>
                <p style="font-size: 12px !important">
                    <?php echo @$aboutSectionContent->lang('description') ?>
                </p>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/about_section.blade.php ENDPATH**/ ?>