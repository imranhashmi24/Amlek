
<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function(){
        $(".react").click(function(){
            var $this  = $(this);
            var likeId = $(this).attr('data-item');
            var type   =   $(this).attr('data-type');
            var url    = "<?php echo e(route('fvtStore')); ?>";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    type: type,
                    property_id: likeId
                },
                success: function(res) {
                    if (res.status === true) {
                        notify('success', res.message);
                        $this.find('i.fa').addClass('text-danger');
                    }
                    if (res.status === false) {
                        notify('success', res.message);
                        $this.find('i.fa').removeClass('text-danger');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    window.location.href = "<?php echo e(route('user.login')); ?>";
                }
            });
        })
    })
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/component/__js_fvt_react.blade.php ENDPATH**/ ?>