<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('sections.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo app('translator')->get('To request a property, kindly fill in the forms'); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('property.request.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Name'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" required>
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
                                    <label class="form-label"><?php echo app('translator')->get('Email'); ?> <span class="text-danger fs-6">*</span></label>
                                    <input type="email" id="Email" name="email" value="<?php echo e(old('email')); ?>"  required
                                        class="form-control">
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
                                    <label class="form-label"><?php echo app('translator')->get('City'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select name="city_id" class="form-select select2-basic" required>

                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Nature of Property seeker'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select class="form-control" name="nature_of_property">
                                        <option value="buyer" <?php if(old('nature_of_property') == 'buyer'): echo 'selected'; endif; ?>> <?php echo app('translator')->get('buyer'); ?> </option>
                                        <option value="sponsored" <?php if(old('nature_of_property') == 'sponsored'): echo 'selected'; endif; ?>> <?php echo app('translator')->get('sponsored'); ?> </option>
                                        <option value="investor" <?php if(old('nature_of_property') == 'investor'): echo 'selected'; endif; ?>> <?php echo app('translator')->get('investor'); ?> </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Property Type'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select name="property_type_id" class="form-select" required>
                                        <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                                        <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if(old('property_type_id') == $type->id): echo 'selected'; endif; ?> value="<?php echo e($type->id); ?>" data-subpropertytypes="<?php echo e($type->subproperty_types); ?>">
                                                <?php echo e($type->lang('name')); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Sub Property Type'); ?> <span class="text-danger fs-6">*</span></label>
                                    <select name="subproperty_type_id" class="form-select" required>
                                        <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Real estate budget'); ?> <span class="text-danger fs-6">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="budget" value="<?php echo e(old('budget')); ?>" required
                                            class="form-control" placeholder="">
                                        <span class="input-group-text"><?php echo e(gs('cur_sym')); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('The purpose of buying the property'); ?> <span class="text-danger fs-6">*</span></label>
                                    <textarea name="purpose" id="purpose" rows="3" class="form-control" required><?php echo e(old('purpose')); ?></textarea>
                                </div>
                            </div>

                            <div class="mb-3 col-5">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Image'); ?> <span class="text-danger fs-6">*</span></label>
                                    <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['class' => 'w-100','name' => 'thumb_image','type' => 'property_thumb']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-100','name' => 'thumb_image','type' => 'property_thumb']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $attributes = $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $component = $__componentOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3 col-7">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Preferred Area'); ?> <span class="text-danger fs-6">*</span></label>
                                    <textarea name="area" id="area" rows="3" class="form-control" required><?php echo e(old('area')); ?></textarea>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Details'); ?> <span class="text-danger fs-6">*</span></label>
                                    <textarea name="detail" id="detail" rows="3" class="form-control" required><?php echo e(old('detail')); ?></textarea>
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
        $('[name=property_type_id]').on('change', function() {
            var val = $(this).find('option:selected').val();

            var subPropertyType = $(this).find('option:selected').data('subpropertytypes');
            subPropetyTypes(subPropertyType);

            // $(".type-info-content").html('');
            // if (val !== undefined && val !== '') {

            //     $.ajax({
            //         url: '/get-property-type-info/' + val,
            //         type: 'GET',
            //         success: function(response) {
            //             $(".type-info-content").html(response);
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(error);
            //         }
            //     });
            // } else {
            //     $(".type-info-content").html('');
            // }
        }).change();


        function subPropetyTypes(subpropertyTypes)
        {

            var option = '<option value="">' + "<?php echo app('translator')->get('Select one'); ?>" + '</option>';
            $.each(subpropertyTypes, function(index, value) {
                var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;
                option += "<option value='" + value.id + "'" + (value.id == "" ? " selected" : "") + ">" + name + "</option>";
            });

            $('select[name=subproperty_type_id]').html(option);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/property_request.blade.php ENDPATH**/ ?>