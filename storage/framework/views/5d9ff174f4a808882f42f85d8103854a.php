<?php

if(request('t')){
    $title = request('t') ?? '';
}
?>




<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('sections.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('request.oportunity_form_submit')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Opportunity Title'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="title" value="<?php echo e(@$title); ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Sector'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select class="form-control" name="sector">
                                        <option value="n/a"><?php echo app('translator')->get('Select one'); ?></option>
                                        <option value="Industry and Mining"><?php echo app('translator')->get('Industry and Mining'); ?></option>
                                        <option value="Tourism Sector"><?php echo app('translator')->get('Tourism Sector'); ?></option>
                                        <option value="Education Sector"><?php echo app('translator')->get('Education Sector'); ?></option>
                                        <option value="Medical and Care Sector"><?php echo app('translator')->get('Medical and Care Sector'); ?></option>
                                        <option value="Hospitality Sector"><?php echo app('translator')->get('Hospitality Sector'); ?></option>
                                        <option value="Commercial Sector"><?php echo app('translator')->get('Commercial Sector'); ?></option>
                                        <option value="Mass Housing Sector"><?php echo app('translator')->get('Mass Housing Sector'); ?></option>
                                        <option value="Construction Sector"><?php echo app('translator')->get('Construction Sector'); ?></option>
                                        <option value="Logistics and Transportation"><?php echo app('translator')->get('Logistics and Transportation'); ?></option>
                                        <option value="Agricultural Sector"><?php echo app('translator')->get('Agricultural Sector'); ?></option>
                                        <option value="Gas Stations Sector"><?php echo app('translator')->get('Gas Stations Sector'); ?></option>
                                        <option value="Commercial Buildings and Complexes Sectorr"><?php echo app('translator')->get('Commercial Buildings and Complexes Sector'); ?></option>
                                        <option value="Commercial and Residential Land Sector"><?php echo app('translator')->get('Commercial and Residential Land Sector'); ?></option>
                                        <option value="Sports Facilities Sector"><?php echo app('translator')->get('Sports Facilities Sector'); ?></option>
                                        <option value="Family Business Sector"><?php echo app('translator')->get('Family Business Sector'); ?></option>
                                    </select>
                                </div>
                            </div>
                            
                             <div class="mb-3 col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Opportunity Description'); ?></label>
                                    <textarea name="opportunity_description" value="<?php echo e(old('opportunity_description')); ?>"
                                        class="form-control"><?php echo e(old('opportunity_description')); ?></textarea>
                                </div>
                            </div>
                            
                            <h6 class="my-5"><?php echo app('translator')->get('Investment Opportunity Information'); ?></h6>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Property Type'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select class="form-control" name="property_type" required>
                                        <option value="n/a"><?php echo app('translator')->get('Select one'); ?></option>
                                        <option value="Hotel"><?php echo app('translator')->get('Hotel'); ?></option>
                                        <option value="Factory"><?php echo app('translator')->get('Factory'); ?></option>
                                        <option value="Farm"><?php echo app('translator')->get('Farm'); ?></option>
                                        <option value="School"><?php echo app('translator')->get('School'); ?></option>
                                        <option value="etc"><?php echo app('translator')->get('etc'); ?></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('City'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="city" value="<?php echo e(old('city')); ?>" class="form-control" required>
                                </div>
                            </div>
                            
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Area'); ?></label>
                                    <input type="text" name="area" value="<?php echo e(old('area')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Address'); ?></label>
                                    <input type="text" name="address" value="<?php echo e(old('address')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Location features'); ?></label>
                                    <input type="text" name="location_features" value="<?php echo e(old('location_features')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Tenant Type'); ?></label>
                                    <input type="text" name="tenant_type" value="<?php echo e(old('tenant_type')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Tenant Capital Construction Value'); ?></label>
                                    <input type="text" name="tenant_capital_construction_value" value="<?php echo e(old('tenant_capital_construction_value')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Selling Price'); ?></label>
                                    <input type="text" name="selling_price" value="<?php echo e(old('selling_price')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Income ratio'); ?></label>
                                    <input type="number" name="income_ratio" value="<?php echo e(old('income_ratio')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Property Nature'); ?></label>
                                    <select class="form-control" name="property_nature">
                                        <option value="n/a"><?php echo app('translator')->get('Select one'); ?></option>
                                        <option value="Mortgage"><?php echo app('translator')->get('Mortgage'); ?></option>
                                        <option value="Resident"><?php echo app('translator')->get('Resident'); ?></option>
                                        <option value="Non-Resident"><?php echo app('translator')->get('Non-Resident'); ?></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Rental Status'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select class="form-control" name="rental_status" required>
                                        <option value="n/a"><?php echo app('translator')->get('Select one'); ?></option>
                                        <option value="Active"><?php echo app('translator')->get('Active'); ?></option>
                                        <option value="Pending"><?php echo app('translator')->get('Pending'); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Full Name'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="full_name" value="<?php echo e(old('full_name')); ?>" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('ID Number'); ?></label>
                                    <input type="text" name="id_number" value="<?php echo e(old('id_number')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Establishment Name'); ?></label>
                                    <input type="text" name="establishment_name" value="<?php echo e(old('establishment_name')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Commercial Registration Number'); ?></label>
                                    <input type="text" name="commercial_registration_number" value="<?php echo e(old('commercial_registration_number')); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Mobile Number'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="mobile_number" value="<?php echo e(old('mobile_number')); ?>" class="form-control" required>
                                </div>
                            </div>
                          
                            <div class="mt-3 mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Email'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" required>
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

<?php echo $__env->make('web.layouts.frontend', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/request/oportunity_form.blade.php ENDPATH**/ ?>