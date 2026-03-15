


<?php $__env->startSection('content'); ?>

<?php
    $breadcrumbContent = getContent('breadcrumb.content', true);
?>


<section class="py-5 pages-banner" style="background-image: url(<?php echo e(getImage('assets/images/frontend/breadcrumb/' . @$breadcrumbContent->data_values->image, '1900x250')); ?>);">
    <div class="container">
        <div class="row">
            <div class="py-5 col-12">
                <h1 class="p-0 m-0 text-center"> <?php echo e(__('The electronic lease documentation')); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">
                    <?php echo __(@$title); ?>

                </h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('ai.service.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">
                                <?php echo e(__('Contract Data')); ?>

                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Contract number'); ?> </label>
                                        <input type="text" name="contract_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Contract type'); ?> </label>
                                        <input type="text" name="contract_type" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Contract sealing date'); ?></label>
                                        <input type="date" name="contract_sealing_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Contract sealing location'); ?> </label>
                                        <input type="text" name="contract_sealing_location" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Tenancy start date'); ?> </label>
                                        <input type="date" name="tenancy_start_date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Tenancy end date'); ?> </label>
                                        <input type="date" name="tenancy_end_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 card">
                        <div class="card-header">
                            <h4 class="mb-0">
                                <?php echo e(__('Lessor')); ?>

                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get("Landlord’s status"); ?> </label>
                                        <input type="text" name="landlord_status_representative" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Landlord representative agency'); ?> /label>
                                        <input type="text" name="landlord_representative_agency" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Date of birth'); ?></label>
                                        <input type="text" name="date_of_birth" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Nationality'); ?> </label>
                                        <input type="text" name="nationality" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('ID type'); ?> </label>
                                        <select name="lessor_id_type" class="form-select">
                                            <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                            <option value="National ID"><?php echo app('translator')->get('National ID'); ?></option>
                                            <option value="Resident ID"><?php echo app('translator')->get('Resident ID'); ?></option>
                                            <option value="Privileged Residency"><?php echo app('translator')->get('Privileged Residency'); ?></option>
                                            <option value="Passport"><?php echo app('translator')->get('Passport'); ?></option>
                                            <option value="Gulf Cooperation Council countries"><?php echo app('translator')->get('Gulf Cooperation Council countries'); ?></option>
                                            <option value="Others"><?php echo app('translator')->get('Others'); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('ID No'); ?></label>
                                        <input type="text" name="lessor_id_no" class="form-control" required>
                                    </div>
                                </div>


                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Mobile phone'); ?></label>
                                        <input type="text" name="lessor_mobile" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('E-mail'); ?> </label>
                                        <input type="text" name="lessor_email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Region'); ?></label>
                                        <input type="text" name="lessor_region" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('City'); ?> </label>
                                        <input type="text" name="lessor_city" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Street Name'); ?> </label>
                                        <input type="text" name="lessor_street_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Building Number'); ?></label>
                                        <input type="text" name="lessor_building_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Additional Number'); ?> </label>
                                        <input type="text" name="lessor_additional_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Zip Code'); ?> </label>
                                        <input type="text" name="lessor_zip_code" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Title Deed'); ?> </label>
                                        <input type="text" name="lessor_title_deed" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Tax Number'); ?></label>
                                        <input type="text" name="lessor_tax_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('IBAN'); ?> </label>
                                        <input type="text" name="lessor_iban" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="my-3 card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <?php echo e(__('Tenant')); ?>

                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get("Name"); ?> <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Date of birth'); ?> <span class="text-danger fs-6">*</span></label>
                                        <input type="date" name="tenant_date_of_birth" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Nationality'); ?> <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_nationality" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('ID type'); ?> <span class="text-danger fs-6">*</span></label>
                                        <select name="tenant_id_type" class="form-select">
                                            <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                            <option value="National ID"><?php echo app('translator')->get('National ID'); ?></option>
                                            <option value="Resident ID"><?php echo app('translator')->get('Resident ID'); ?></option>
                                            <option value="Privileged Residency"><?php echo app('translator')->get('Privileged Residency'); ?></option>
                                            <option value="Passport"><?php echo app('translator')->get('Passport'); ?></option>
                                            <option value="Gulf Cooperation Council countries"><?php echo app('translator')->get('Gulf Cooperation Council countries'); ?></option>
                                            <option value="Others"><?php echo app('translator')->get('Others'); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('ID No'); ?> <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_id_no" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Mobile phone'); ?> <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_mobile" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('E-mail'); ?> <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Region'); ?> <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_region" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('City'); ?> <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_city" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Street Name'); ?> <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tentent_street_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Building Number'); ?> </label>
                                        <input type="text" name="tenant_building_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Additional Number'); ?></label>
                                        <input type="text" name="tenant_additional_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Zip Code'); ?> </label>
                                        <input type="text" name="tenant_zip_code" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Tenant type'); ?></label>
                                        <select name="tenant_type" class="form-select">
                                            <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                            <option value="Individual"><?php echo app('translator')->get('Individual'); ?></option>
                                            <option value="Institution"><?php echo app('translator')->get('Institution'); ?></option>
                                            <option value="Organization"><?php echo app('translator')->get('Organization'); ?></option>
                                            <option value="Government"><?php echo app('translator')->get('Government'); ?></option>
                                            <option value="Others"><?php echo app('translator')->get('Others'); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('If the tenant is an institution, enter the commercial registration number'); ?></label>
                                        <input type="text" name="tenant_institution_registration_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('If you has a contract of association, enter the number of the contract of association'); ?> </label>
                                        <input type="text" name="tenant_association_contract_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('If the tenant is an individual enter the number of family members'); ?> </label>
                                        <input type="text" name="tenant_family_members" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="my-3 card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <?php echo e(__('Property')); ?>

                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get("National address"); ?> </label>
                                        <input type="text" name="property_national_address" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Property type'); ?></label>
                                        <input type="text" name="property_type" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Property usage'); ?></label>
                                        <input type="text" name="property_usage" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Number of floors'); ?> </label>
                                        <input type="text" name="property_number_of_floors" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Number of units'); ?></label>
                                        <input type="text" name="property_number_of_units" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Is there an elevator or not?'); ?> </label>
                                        <input type="text" name="property_elevator_or_not" class="form-control" required>
                                    </div>
                                </div>


                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Electricity meter number'); ?> </label>
                                        <input type="text" name="property_electricity_meter_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Current meter reading Or a fixed amount'); ?> </label>
                                        <input type="text" name="property_current_meter_reading_or_a_fixed_amount" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Water meter number'); ?> </label>
                                        <input type="text" name="property_water_meter_number" class="form-control" required>
                                    </div>
                                </div>

                              

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Gas meter number'); ?> </label>
                                        <input type="text" name="property_gas_meter_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Value Rent Annual rental fees for the unit'); ?> </label>
                                        <select name="property_rent_annual_rental_fees" class="form-select">
                                            <option value="0"><?php echo app('translator')->get('Choose how the tenant will pay the total contract value'); ?></option>
                                            <option value="Single Payment"><?php echo app('translator')->get('Single Payment'); ?></option>
                                            <option value="Recurring Payments"><?php echo app('translator')->get('Recurring Payments'); ?></option>
                                            <option value="Flexible Payments"><?php echo app('translator')->get('Flexible Payments'); ?></option>
                                            <option value="Monthly"><?php echo app('translator')->get('Monthly'); ?></option>
                                            <option value="Quarterly"><?php echo app('translator')->get('Quarterly'); ?></option>
                                            <option value="Semi-annual"><?php echo app('translator')->get('Semi-annual'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 text-center col-12">
                                <button class="submit-btn w-100"><?php echo app('translator')->get('Send Request'); ?></button>
                            </div>
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

<?php echo $__env->make('web.layouts.frontend', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/ai_service.blade.php ENDPATH**/ ?>