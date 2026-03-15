<?php
    $investmentSectorContent = getContent('social_investment_sector.content', true);
    $investmentSectorElements = getContent('social_investment_sector.element', null, false, true);

?>

<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center"><?php echo app('translator')->get('Please fill in the form detailing the required sector and we will contact you'); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('social.service.request.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Name'); ?> <span class="text-danger fs-6">*</span></label>
                                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" required>
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
                                <label><?php echo e($investmentSectorContent->lang('heading') ?? ''); ?><span class="text-danger fs-6">*</span></label>
                                <select name="sectors[]" class="form-select select2-multiple" required multiple>
                                    <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                                    <?php $__currentLoopData = $investmentSectorElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investmentSectorElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($investmentSectorElement->data_values->sector_name); ?>">
                                            <?php echo e($investmentSectorElement->lang('sector_name')); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>


                        <div class="mb-3 col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Country'); ?> <span class="text-danger fs-6">*</span></label>
                                <select name="country_id" class="form-select select2-basic" required>
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
                                <label class="form-label"><?php echo app('translator')->get('Select City'); ?> <span class="text-danger fs-6">*</span></label>
                                <select name="city_id" class="form-select select2-basic" required></select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Required sector'); ?> <span class="text-danger fs-6">*</span></label>
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
                                <label class="form-label"><?php echo app('translator')->get('Budget'); ?> <span class="text-danger fs-6">*</span></label>
                               <input type="text" class="form-control" name="budget" required>
                            </div>
                        </div>
                        <div class="mt-3 mb-3 col-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Brief description of the required Service'); ?> <span class="text-danger fs-6">*</span></label>
                                <textarea name="description" rows="4" class="form-control" required><?php echo e(old('description')); ?></textarea>
                            </div>
                        </div>
                        <div class="mt-3 col-12">
                            <button class="submit-btn w-100"><?php echo app('translator')->get('Send Request'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('script'); ?>
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = [`<option value=""><?php echo app('translator')->get('Select One'); ?></option>`];

            $.each(cities, function(index, value) {
                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + ">" +
                    value.name + "</option>";
            });

            $('select[name=city_id]').html(option);
        }).change();
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/service_request.blade.php ENDPATH**/ ?>