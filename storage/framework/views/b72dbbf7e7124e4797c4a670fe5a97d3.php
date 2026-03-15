<?php $__env->startPush('seo'); ?>
    <meta name="title" Content="<?php echo e(@$promotion->lang('short_description')); ?>">
    <meta name="description" content="<?php echo e(@$promotion->lang('short_description')); ?>">
    <meta name="keywords" content="<?php echo e(implode(',',$seo->keywords)); ?>">
    <link rel="shortcut icon" href="<?php echo e(siteFavicon()); ?>" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="<?php echo e(siteLogo()); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php echo e(@$promotion->lang('short_description')); ?>">
    
    <meta itemprop="name" content="<?php echo e(@$promotion->lang('short_description')); ?>">
    <meta itemprop="description" content="<?php echo e(@$promotion->lang('short_description')); ?>">
    <meta itemprop="image" content="<?php echo e(getImage('assets/images/frontend/promotion/' . @$promotion->data_values->image)); ?>">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e(@$promotion->lang('short_description')); ?>">
    <meta property="og:description" content="<?php echo e(@$promotion->lang('short_description')); ?>">
    <meta property="og:image" content="<?php echo e(getImage('assets/images/frontend/promotion/' . @$promotion->data_values->image)); ?>"/>
    <?php $socialImageSize = explode('x', getFileSize('seo')) ?>
    <meta property="og:image:width" content="<?php echo e($socialImageSize[0]); ?>" />
    <meta property="og:image:height" content="<?php echo e($socialImageSize[1]); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    
    <meta name="twitter:card" content="summary_large_image">
<?php $__env->stopPush(); ?>
<?php
    $o_countries = App\Models\Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
    $countries = sortOrder($o_countries);
?>
<?php $__env->startSection('content'); ?>
    <section class="py-5 pages-banner" style="background-image: url(<?php echo e(asset('assets/images/frontend/breadcrumb/65c196d169df31707185873.png')); ?>);">
        <div class="container">
            <div class="row">
                <div class="py-5 col-12">
                    <h1 class="p-0 m-0 text-center my-5"></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <?php echo @$promotion->lang('short_description'); ?>

                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('promotion.request.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="form-label"><?php echo app('translator')->get('Name'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="form-label"><?php echo app('translator')->get('Email'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="form-label"><?php echo app('translator')->get('Mobile Number'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="form-label"><?php echo app('translator')->get('Country'); ?> <span class="text-danger fs-6">*</span></label>
                            <select name="country_id" class="form-select" required>
                                <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>" data-cities="<?php echo e($country->city); ?>"
                                        <?php if(old('country_id' == @$country->id)): echo 'selected'; endif; ?>>
                                        <?php if(app()->getLocale() == 'en'): ?>
                                            <?php echo e($country->name); ?>

                                        <?php else: ?>
                                            <?php echo e($country->name_ar); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="form-label"><?php echo app('translator')->get('City'); ?> <span class="text-danger fs-6">*</span></label>
                            <select name="city_id" class="form-select" required>
                                <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="form-label"><?php echo app('translator')->get('Message'); ?> <span class="text-danger fs-6">*</span></label>
                            <textarea name="message" class="form-control" id="" cols="30" rows="10" required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-base w-25"><?php echo app('translator')->get('Submit Request'); ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = [`<option value=""><?php echo app('translator')->get('Select One'); ?></option>`];
            $.each(cities, function(index, value) {
                var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;

                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + ">" +
                    name + "</option>";
            });
            $('select[name=city_id]').html(option);
        }).change();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/promotion_request.blade.php ENDPATH**/ ?>