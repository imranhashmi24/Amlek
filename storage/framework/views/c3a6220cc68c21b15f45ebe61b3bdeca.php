<?php $__env->startSection('content'); ?>
<div class="card custom-card">
    <div class="card-body">
        <form action="<?php echo e(route('user.properties.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Property Title'); ?> <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Property Title'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title_ar" value="<?php echo e(old('title_ar')); ?>" required
                            class="form-control">
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Property Slug'); ?> <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="slug" value="<?php echo e(old('slug')); ?>" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Construction Type'); ?> <span class="text-danger fs-6">*</span></label>
                        <select name="construction_type" class="form-select" required>
                            <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                            <option value="Under Construction" <?php if(old('construction_type') == 'Under Construction'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Under Construction'); ?>
                            </option>
                            <option value="Ready" <?php if(old('construction_type') == 'Ready'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Ready'); ?></option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Purpose'); ?> <span class="text-danger fs-6">*</span></label>
                        <select name="purpose" class="form-select" required>
                            <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                            <option value="Purchase" <?php if(old('purpose') == 'Purchase'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Purchase'); ?></option>
                            <option value="Sale" <?php if(old('purpose') == 'Sale'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Sale'); ?></option>
                            <option value="Kissing" <?php if(old('purpose') == 'Kissing'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Kissing'); ?></option>
                            <option value="Exit" <?php if(old('purpose') == 'Exit'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Exit'); ?></option>
                            <option value="Faltering" <?php if(old('purpose') == 'Faltering'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Faltering'); ?></option>
                            <option value="Selling" <?php if(old('purpose') == 'Selling'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Selling'); ?></option>
                            <option value="Buying" <?php if(old('purpose') == 'Buying'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Buying'); ?></option>
                            <option value="Establishing" <?php if(old('purpose') == 'Establishing'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Establishing'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Property Type'); ?> <span class="text-danger fs-6">*</span></label>
                        <select name="property_type_id" class="form-select" required>
                            <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                            <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>" <?php if(old('property_type_id' == @$type->id)): echo 'selected'; endif; ?> data-subpropertytypes="<?php echo e($type->subproperty_types); ?>">
                                    <?php echo e($type->lang('name')); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Sub Property Type'); ?></label>
                        <select name="subproperty_type_id" class="form-select">
                            <option value=""><?php echo app('translator')->get('Select One'); ?></option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="my-3 product-card">
                <div class="product-card-header">
                    <h6 class="m-0 text-light"><span><?php echo app('translator')->get('Detail'); ?></span></h6>
                </div>
                <div class="product-card-body type-info-content">
                </div>
            </div>

            <div class="product-card">
                <div class="product-card-header">
                    <h6 class="m-0 text-light"><?php echo app('translator')->get('Price Information'); ?></h6>
                </div>
                <div class="product-card-body">
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Price'); ?> <span class="text-danger fs-6">*</span></label>
                                <div class="input-group">
                                    <input type="number" step="any" name="price"
                                        value="<?php echo e(old('price')); ?>" class="form-control" required>
                                    <span class="input-group-text"><?php echo e(gs('cur_sym')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Per Square Meter Price'); ?> <span class="text-danger fs-6">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="sqr_price" value="<?php echo e(old('sqr_price')); ?>"
                                        class="form-control" required>
                                    <span class="input-group-text"><?php echo e(gs('cur_sym')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Ref no.'); ?></label>
                                <input type="text" name="reference_no" value="<?php echo e(old('reference_no')); ?>"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-3 product-card">
                <div class="product-card-header">
                    <h6 class="m-0 text-light"><?php echo app('translator')->get('Location Information'); ?></h6>
                </div>
                <div class="product-card-body">
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Country'); ?> <span class="text-danger fs-6">*</span></label>
                                <select name="country_id" class="form-select" required>
                                    <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>"
                                            data-cities="<?php echo e($country->city); ?>"
                                            <?php if(old('country_id' == @$country->id)): echo 'selected'; endif; ?>>
                                            <?php echo e($country->lang('name')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('City'); ?> <span class="text-danger fs-6">*</span></label>
                                <select name="city_id" class="form-control" required>

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 col-12 col-md-12 col-lg-12">
                            <div id="address-map-container" style="width:100%;height:400px; margin-top:10px">
                                <div style="width: 100%; height: 100%" id="address-map"></div>
                            </div>
                        </div>

                        <div class="mb-3 col-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="address_address"><?php echo app('translator')->get('Location & Nearby'); ?> (<?php echo app('translator')->get('PB Value'); ?>)</label>
                                <input type="text" id="address-input" name="address" class="form-control map-input">
                                <input type="hidden" name="latitude" id="address-latitude" value="0" />
                                <input type="hidden" name="longitude" id="address-longitude" value="0" />
                            </div>

                        </div>


                        <div class="mb-3 col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Features and Amenities'); ?>  </label>
                                <textarea name="features" class="form-control tinymceeditor" rows="2"><?php echo e(old('features')); ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Features and Amenities'); ?> (<?php echo app('translator')->get('Arabic'); ?>)  </label>
                                <textarea name="features_ar" class="form-control tinymceeditor" rows="2"><?php echo e(old('features_ar')); ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Fixtures and Fittings'); ?> </label>
                                <textarea name="fixtures" class="form-control tinymceeditor" rows="2"><?php echo e(old('fixtures')); ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Fixtures and Fittings'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</label>
                                <textarea name="fixtures_ar" class="form-control tinymceeditor" rows="2"><?php echo e(old('fixtures_ar')); ?></textarea>
                            </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Street'); ?></label>
                                <input type="text" name="street"
                                    value="<?php echo e(old('street', @$property->street)); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Width'); ?></label>
                                <input type="text" name="street_width" value="<?php echo e(old('street_width')); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Facing'); ?></label>
                                <input type="text" name="facing" value="<?php echo e(old('facing')); ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Ad license number'); ?></label>
                                <input type="text" name="ad_license_number" value="<?php echo e(old('ad_license_number')); ?>"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-3 product-card">
                <div class="product-card-header">
                    <h6 class="m-0 text-light"><?php echo app('translator')->get('Images'); ?></h6>
                </div>
                <div class="product-card-body">
                    <div class="row">
                        <div class="mb-3 col-12 col-md-4">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Thumbnail Image'); ?> <span class="text-danger fs-6">*</span></label>
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
                        <div class="mb-3 col-12 col-md-8">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Images'); ?></label>
                                <div>
                                    <div class="input-images"></div>
                                </div>
                                <div class="mt-3">
                                    <small class="mt-3 text-muted"> <?php echo app('translator')->get('Supported Files:'); ?>
                                        <?php echo app('translator')->get('Supported Files:'); ?> <b>.png, .jpg, .jpeg</b> <?php echo app('translator')->get('Image will be resized into'); ?>
                                        <b><?php echo e(getFileSize('property')); ?></b> <?php echo app('translator')->get('px'); ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Property Description'); ?> <span class="text-danger fs-6">*</span></label>
                        <textarea name="description" class="form-control nicEdit" rows="10" required><?php echo e(old('description')); ?></textarea>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Property Description'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
                        <textarea name="description_ar" class="form-control nicEdit" rows="10" required><?php echo e(old('description_ar')); ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 col-12 col-md-12">
                        <button type="submit" class="btn btn-base w-100"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/image-uploader.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link href="<?php echo e(asset('assets/global/css/image-uploader.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>





<?php $__env->startPush('script'); ?>
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = '<option value="">Select one</option>';
            $.each(cities, function(index, value) {
                var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;
                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + "data-lat='" + value.lat +"' data-lng='"+value.lng+"'>" +
                    name + "</option>";
            });
            $('select[name=city_id]').html(option);
        }).change();

        $("input[name=title]").on('	keypress', function() {
            var title = $(this).val();
            var generateSlug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $("input[name=slug]").val(generateSlug);
        })


        // image uploder
        <?php if(isset($images)): ?>
            let preloaded = <?php echo json_encode($images, 15, 512) ?>;
        <?php else: ?>
            let preloaded = [];
        <?php endif; ?>

        $('.input-images').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'images',
            preloadedInputName: 'old',
            maxSize: 3 * 1024 * 1024,
            maxFiles: 10,
        });


        $('[name=city_id]').on('change', function() {
            var lat = $(this).find('option:selected').data('lat');
            var lng = $(this).find('option:selected').data('lng');

            if(lat != undefined && lng != undefined){
                $("#address-latitude").val(lat);
                $("#address-longitude").val(lng);

                initialize();
            }

        }).change();



        $('[name=property_type_id]').on('change', function() {

            var val = $(this).find('option:selected').val();
            var subPropertyType = $(this).find('option:selected').data('subpropertytypes');
            subPropetyTypes(subPropertyType);

            $(".type-info-content").html('');
            if (val !== undefined && val !== '') {

                $.ajax({
                    url: '/get-property-type-info/' + val,
                    type: 'GET',
                    success: function(response) {
                        $(".type-info-content").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $(".type-info-content").html('');
            }
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

<?php $__env->startPush('script-lib'); ?>
<script src="<?php echo e(asset('assets/global/js/map.js')); ?>"></script>
<script
src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&libraries=places&callback=initialize"
async defer>
</script>
<?php $__env->stopPush(); ?>




<?php $__env->startPush('style'); ?>
    <style>
        .product-card {
            border: 1px solid #1a2232;
            border-radius: 5px;
        }

        .product-card-body {
            padding: 15px;
        }

        .product-card-header {
            background: #1a2232;
            padding: 10px;
        }

        .image-uploader {
            min-height: 278px !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('title'); ?>
    <h5><?php echo app('translator')->get('Add Property'); ?></h5>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.master', ['title' => 'Create Property'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/user/property/create.blade.php ENDPATH**/ ?>