<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/web/css/custom.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .property-image img{
        height: 200px !important;
    }
    .body-content{
        margin-bottom: 7px !important;
        height: 150px !important;
        overflow: hidden;
    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/web/js/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.flan-view').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });

        $(".clickType2").click(function(){
            var type = $(this).val();
            // var slug = "<?php echo e(@$auction->slug); ?>";
            var slug = encodeURIComponent("<?php echo e(@$auction->slug); ?>");

            var url = "<?php echo e(route('auction.details', ['slug' => ':slug'])); ?>";

            url = url.replace(':slug', slug);

            var formData = new FormData();

            formData.append('type', type);

            var form = document.createElement('form');
            form.setAttribute('method', 'get');
            form.setAttribute('action', url);

            for (var pair of formData.entries()) {
                var input = document.createElement('input');
                input.setAttribute('type', 'hidden');
                input.setAttribute('name', pair[0]);
                input.setAttribute('value', pair[1]);
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        });

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/pages/includes/__auction_common_js.blade.php ENDPATH**/ ?>