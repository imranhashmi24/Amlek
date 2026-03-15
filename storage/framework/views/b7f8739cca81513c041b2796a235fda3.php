<?php $__env->startSection('panel'); ?>
<form action="<?php echo e(route('admin.auction.update', @$auction->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Auction Title'); ?> <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title" value="<?php echo e(old('title', @$auction->title)); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Auction Title'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title_ar" value="<?php echo e(old('title_ar', @$auction->title_ar)); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Auction Slug'); ?> <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="slug" value="<?php echo e(old('slug', @$auction->slug)); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Auction day'); ?> <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <input type="number" name="auction_day" value="<?php echo e(old('auction_day', @$auction->auction_day)); ?>" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Auction Date'); ?> <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <input type="date" name="auction_date" value="<?php echo e(old('auction_date', @$auction->auction_date)); ?>" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Beginning Time'); ?> <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <input type="datetime-local" name="beginning_time" value="<?php echo e(old('beginning_time', @$auction->beginning_time)); ?>" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Properties'); ?> <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <select class="form-control select2-multiple" name="property_ids[]" multiple>
                                <option value="0"><?php echo app('translator')->get('Select multiple property'); ?></option>

                                <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $selected = false;
                                        foreach ($auction_properties as $auction_property) {
                                            if ($property->id == $auction_property['property_id']) {
                                                $selected = true;
                                                break;
                                            }
                                        }
                                    ?>
                                    <option value="<?php echo e($property->id); ?>" <?php echo e($selected ? 'selected' : ''); ?>>
                                        <?php if(app()->getLocale() == 'en'): ?>
                                            <?php echo e($property->title); ?>

                                        <?php else: ?>
                                            <?php echo e($property->title_ar); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
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
                        <select name="country_id" class="form-control" required>
                            <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option  value="<?php echo e($country->id); ?>" data-cities="<?php echo e($country->city); ?>"  <?php if(old('country_id', @$auction->country_id == @$country->id)): echo 'selected'; endif; ?>>
                                <?php if(app()->getLocale() == 'en'): ?>
                                <?php echo e($country->name); ?>

                                <?php else: ?>
                                <?php echo e($country->name_ar); ?>

                                <?php endif; ?>
                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('City'); ?> <span class="text-danger fs-6">*</span></label>
                        <select name="city_id" class="form-control">
                            <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                            <option value="<?php echo e(@$auction->city_id); ?>" data-lat="<?php echo e(@$auction->latitude); ?>"
                                data-lng="<?php echo e(@$auction->longitude); ?>" selected>
                                <?php echo e(!empty($auction->city->name)); ?></option>
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
                        <label for="address_address"><?php echo app('translator')->get('Location'); ?></label>
                        <input type="text" id="address-input" name="address" class="form-control map-input" value="<?php echo e(@$auction->address); ?>">
                        <input type="hidden" name="latitude" id="address-latitude" value="<?php echo e(@$auction->latitude); ?>" />
                        <input type="hidden" name="longitude" id="address-longitude" value="<?php echo e(@$auction->longitude); ?>"  />
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
                        <label class="form-label"><?php echo app('translator')->get('Thumb Image'); ?> <span class="text-danger fs-6">*</span></label>
                        <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['image' => ''.e(@$auction->thumb_image).'','class' => 'w-100','name' => 'thumb_image','type' => 'auction_thumb']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(@$auction->thumb_image).'','class' => 'w-100','name' => 'thumb_image','type' => 'auction_thumb']); ?>
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
                            <small class="mt-3 text-muted"> <?php echo app('translator')->get('Supported Files'); ?>:
                                <?php echo app('translator')->get('Supported Files'); ?>: <b>.<?php echo app('translator')->get('png'); ?>, .<?php echo app('translator')->get('jpg'); ?>, .<?php echo app('translator')->get('jpeg'); ?></b> <?php echo app('translator')->get('Image will be resized into'); ?>
                                <b><?php echo e(getFileSize('auction')); ?></b> <?php echo app('translator')->get('px'); ?>
                            </small>
                        </div>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Documents'); ?> (<?php echo app('translator')->get('Support only pdf'); ?>)</label>
                        <input type="file" name="document" class="form-control" accept=".pdf">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-12 col-md-12">
            <div class="form-group">
                <label class="form-label"><?php echo app('translator')->get('Description'); ?> <span class="text-danger fs-6">*</span></label>
                <textarea name="description" class="form-control nicEdit" rows="10"><?php echo e(old('description', @$auction->description)); ?></textarea>
            </div>
        </div>
        <div class="mb-3 col-12 col-md-12">
            <div class="form-group">
                <label class="form-label"><?php echo app('translator')->get('Description'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
                <textarea name="description_ar" class="form-control nicEdit" rows="10"><?php echo e(old('description_ar', @$auction->description_ar)); ?></textarea>
            </div>
        </div>

        <div class="mb-3 col-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label class="form-label"><?php echo app('translator')->get('Status'); ?> <span class="text-danger fs-6">*</span></label>
                <select name="status" class="form-control" required>
                    <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                    <option <?php echo e(@$auction->status == 0 ? 'selected' : ''); ?> value="0"><?php echo app('translator')->get('Pending'); ?></option>
                    <option <?php echo e(@$auction->status == 1 ? 'selected' : ''); ?> value="1"><?php echo app('translator')->get('Current'); ?></option>
                    <option <?php echo e(@$auction->status == 2 ? 'selected' : ''); ?> value="2"><?php echo app('translator')->get('Upcoming'); ?></option>
                    <option <?php echo e(@$auction->status == 3 ? 'selected' : ''); ?> value="2"><?php echo app('translator')->get('Finished'); ?></option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3 col-12 col-md-12">
                <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
<script src="<?php echo e(asset('assets/global/js/image-uploader.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
<link href="<?php echo e(asset('assets/global/css/image-uploader.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
<a href="<?php echo e(route('admin.auction.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
    <?php echo app('translator')->get('Back'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

<script>


    $('[name=country_id]').on('change', function() {
        var cities = $(this).find('option:selected').data('cities');

        var option = '<option value=""><?php echo app('translator')->get('Select one'); ?></option>';
        $.each(cities, function(index, value) {

            var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;

            option += "<option value='" + value.id + "' " + (value.id == "<?php echo e($auction->city_id); ?>" ? "selected" : "") + "data-lat='" + value.lat + "' data-lng='" + value.lng + "'>" +
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
        preloaded: preloaded
        , imagesInputName: 'images'
        , preloadedInputName: 'old'
        , maxSize: 3 * 1024 * 1024
        , maxFiles: 10
    , });


    $('[name=city_id]').on('change', function() {
        var lat = $(this).find('option:selected').data('lat');
        var lng = $(this).find('option:selected').data('lng');

        if (lat != undefined && lng != undefined) {
            $("#address-latitude").val(lat);
            $("#address-longitude").val(lng);

            initialize();
        }

    }).change();

</script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script-lib'); ?>
<script src="<?php echo e(asset('assets/global/js/map.js')); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&libraries=places&callback=initialize" async defer>
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


<?php echo $__env->make('admin.layouts.app', ['title' => 'Edit Auction'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/auction/edit.blade.php ENDPATH**/ ?>