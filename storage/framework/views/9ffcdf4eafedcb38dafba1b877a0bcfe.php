<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('sections.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('finance.request.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Name'); ?><span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Family Name'); ?><span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="family_name" value="<?php echo e(old('family_name')); ?>" required
                                        class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('National ID number / Iqama number'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="nid" value="<?php echo e(old('nid')); ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Email'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="email" id="Email" name="email" value="<?php echo e(old('email')); ?>" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Mobile Number'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="mobile" value="<?php echo e(old('mobile')); ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Do you have an account with Alawwal?'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select name="alawwal" class="form-control" required>
                                        <option value="yes" <?php if(old('alawwal') == 'yes'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Yes'); ?></option>
                                        <option value="no" <?php if(old('alawwal') == 'no'): echo 'selected'; endif; ?>><?php echo app('translator')->get('No'); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Property Type'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select name="property_type_id" class="form-select" required>
                                        <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                                        <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if(old('property_type_id') == $type->id): echo 'selected'; endif; ?> value="<?php echo e($type->id); ?>">
                                                <?php echo e($type->lang('name')); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Country'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select name="country_id" class="form-control select2-basic" required>
                                        <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>" data-cities="<?php echo e($country->city); ?>"
                                                <?php if(old('country_id', @$propertyTypeArea->country_id == @$country->id)): echo 'selected'; endif; ?>>
                                                <?php echo e($country->lang('name')); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('City'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select name="city_id" class="form-control select2-basic" required>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Activity'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select name="monthly_income" id="monthlyincome" class="form-select" required>
                                        <option value="5,000 - 12,499" <?php if(old('monthly_income') == '5,000 - 12,499'): echo 'selected'; endif; ?>>5,000 - 12,499
                                            <?php echo e(gs('cur_sym')); ?></option>
                                        <option value="12,500 - 19,999 SAR" <?php if(old('monthly_income') == '12,500 - 19,999'): echo 'selected'; endif; ?>> 12,500 - 19,999
                                            <?php echo e(gs('cur_sym')); ?></option>
                                        <option value="20,000 or more" <?php if(old('monthly_income') == '20,000 or more'): echo 'selected'; endif; ?>> 20,000 <?php echo app('translator')->get('or more'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3 text-center col-12">
                                <button class="submit-btn w-100"><?php echo app('translator')->get('Send Request'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <?php if(@$sections->secs != null): ?>
        <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>


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

<?php echo $__env->make('web.layouts.frontend', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/finance_request.blade.php ENDPATH**/ ?>