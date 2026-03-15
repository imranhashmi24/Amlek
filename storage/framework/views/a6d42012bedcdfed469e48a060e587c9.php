<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sections.property_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="py-5 property property-bg-color">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('web.component.property_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="pb-3 col-12">
                <div class="sort-property d-flex justify-content-between align-items-center">
                    <div>
                        <p class="m-0"><?php echo app('translator')->get('Find'); ?> <b><?php echo e($properties->count()); ?></b> <?php echo app('translator')->get('properties'); ?></p>
                    </div>
                </div>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php echo $__env->make('web.component.singleproperty', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h4 class="py-5 text-center"><?php echo app('translator')->get('Property not found'); ?></h4>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if(@$sections->secs != null): ?>
    <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php echo $__env->make('sections.advance_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .sort-links {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #faf5f5;
        /* Light gray background */
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sort-links a {
        text-decoration: none;
        color: #333;
        padding: 8px 16px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .sort-links a.active {
        background-color: #39004e;
        color: #fff;
    }

    .sort-links a:hover {
        background-color: #39004e;
        color: #fff;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $('.price-select').on('change', function() {
        let link = $(this).find('option:selected').data('link');
        if (link) {
            window.location.href = link;
        }
    })
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $(document).on('click', '.favorite', function(e) {
        e.preventDefault();
        var $this = $(this);
        var property_id = $(this).attr('data-property');
        var url = "<?php echo e(route('favorite.store')); ?>";
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                property_id: property_id
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
                window.location.href = "user/login";
            }
        });
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Property Detail'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/pages/property.blade.php ENDPATH**/ ?>