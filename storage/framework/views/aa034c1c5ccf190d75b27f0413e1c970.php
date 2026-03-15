<?php $__env->startSection('panel'); ?>
<form action="<?php echo e(route('admin.events.update', @$event->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Event Title'); ?> <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title" value="<?php echo e(old('title', @$event->title)); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Event Title'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title_ar" value="<?php echo e(old('title_ar', @$event->title_ar)); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Event Slug'); ?> <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="slug" value="<?php echo e(old('slug', @$event->slug)); ?>" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Category'); ?> <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <select class="form-control" name="category_id">
                                <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', @$event->category_id) == $category->id ? 'selected' : ''); ?>>
                                        <?php if(app()->getLocale() == 'en'): ?>
                                        <?php echo e($category->title); ?>

                                        <?php else: ?>
                                        <?php echo e($category->title_ar); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Type'); ?> <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <select class="form-control" name="type">
                                <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                <?php $__currentLoopData = $eventTypeElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type->data_values->title); ?>" <?php echo e(old('type', @$event->type) == $type->data_values->title ? 'selected' : ''); ?>>
                                        <?php if(app()->getLocale() == 'en'): ?>
                                        <?php echo e($type->data_values->title); ?>

                                        <?php else: ?>
                                        <?php echo e($type->data_values->title_ar); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Audience Type'); ?> <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <select class="form-control" name="audience_type">
                                <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                <?php $__currentLoopData = $audienceTypeElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audienceType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($audienceType->data_values->title); ?>"
                                        <?php echo e(old('audience_type', @$event->audience_type) == $audienceType->data_values->title ? 'selected' : ''); ?>

                                    >
                                        <?php if(app()->getLocale() == 'en'): ?>
                                        <?php echo e($audienceType->data_values->title); ?>

                                        <?php else: ?>
                                        <?php echo e($audienceType->data_values->title_ar); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Sector'); ?> <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <select class="form-control" name="sector">
                                <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                <?php $__currentLoopData = $eventSectorElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventSector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($eventSector->data_values->title); ?>"
                                        <?php echo e(old('sector', @$event->sector) == $eventSector->data_values->title ? 'selected' : ''); ?>

                                    >
                                        <?php if(app()->getLocale() == 'en'): ?>
                                        <?php echo e($eventSector->data_values->title); ?>

                                        <?php else: ?>
                                        <?php echo e($eventSector->data_values->title_ar); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="my-3 col-12 col-md-12 col-lg-12">
                    <div class="form-group d-flex justify-content-start">
                        <label class="w-25 form-label"><?php echo app('translator')->get('Event start & end same time'); ?></label>
                        <div class="input-group">
                            <input type="checkbox" name="same_time" value="<?php echo e($event->same_time); ?>" <?php echo e($event->same_time == 1 ? 'checked' : ''); ?>

                            class="custom-checkbox" id="sameTimeCheckbox">
                        </div>
                    </div>
                </div>


                <div class="mb-3 col-12 col-md-12 col-lg-12" id="startEndFields">
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('Start Date & Time'); ?> <span class="text-danger fs-6">*</span></label>
                                <div class="input-group">
                                    <input type="datetime-local" name="start_time" value="<?php echo e($event->start_time); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo app('translator')->get('End Date & Time'); ?> <span class="text-danger fs-6">*</span></label>
                                <div class="input-group">
                                    <input type="datetime-local" name="end_time" value="<?php echo e($event->end_time); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                   </div>

                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-6" id="eventDateField" style="display: none;">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Event Date & Time'); ?> <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <input type="datetime-local" name="same_time_date" value="<?php echo e($event->start_time); ?>" class="form-control">
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
                            <option value="<?php echo e($country->id); ?>" data-cities="<?php echo e($country->city); ?>"
                             <?php echo e(old('country_id', @$event->country_id) == $country->id ? 'selected' : ''); ?>

                            >
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
                            <option value="<?php echo e($event->city_id); ?>" data-lat="<?php echo e($event->latitude); ?>"
                                data-lng="<?php echo e($event->longitude); ?>" selected>
                                <?php echo e(!empty($event->city->name)); ?></option>
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
                        <input type="text" id="address-input" name="address" class="form-control map-input" value="<?php echo e(@$event->address); ?>">
                        <input type="hidden" name="latitude" id="address-latitude" value="<?php echo e(@$event->latitude); ?>" />
                        <input type="hidden" name="longitude" id="address-longitude" value="<?php echo e(@$event->longitude); ?>" />
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
                        <label class="form-label"><?php echo app('translator')->get('Image'); ?> <span class="text-danger fs-6">*</span></label>
                        <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['class' => 'w-100','name' => 'image','type' => 'events','imagePath' => ''.e(getImage(getFilePath('events') . '/' . @$event->image, getFileSize('events'))).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-100','name' => 'image','type' => 'events','imagePath' => ''.e(getImage(getFilePath('events') . '/' . @$event->image, getFileSize('events'))).'']); ?>
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
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-12 col-md-12">
            <div class="form-group">
                <label class="form-label"><?php echo app('translator')->get('Description'); ?> <span class="text-danger fs-6">*</span></label>
                <textarea name="description" class="form-control nicEdit" rows="10"><?php echo e(old('description', @$event->description)); ?></textarea>
            </div>
        </div>
        <div class="mb-3 col-12 col-md-12">
            <div class="form-group">
                <label class="form-label"><?php echo app('translator')->get('Description'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
                <textarea name="description_ar" class="form-control nicEdit" rows="10"><?php echo e(old('description_ar', @$event->description_ar)); ?></textarea>
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
<a href="<?php echo e(route('admin.events.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
    <?php echo app('translator')->get('Back'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

<script>


    $('[name=country_id]').on('change', function() {
        var cities = $(this).find('option:selected').data('cities');

        var option = '<option value=""><?php echo app('translator')->get('Select one'); ?></option>';
        $.each(cities, function(index, value) {

            var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;

            option += "<option value='" + value.id + "' " + (value.id == "<?php echo e($event->city_id); ?>" ? "selected" : "") + "data-lat='" + value.lat + "' data-lng='" + value.lng + "'>" +
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


    document.addEventListener("DOMContentLoaded", function() {
        const sameTimeCheckbox = document.getElementById("sameTimeCheckbox");
        const startEndFields = document.getElementById("startEndFields");
        const eventDateField = document.getElementById("eventDateField");

        if (sameTimeCheckbox.checked) {
            startEndFields.style.display = "none";
            eventDateField.style.display = "block";
        }

        sameTimeCheckbox.addEventListener("change", function() {
            if (this.checked) {
                startEndFields.style.display = "none";
                eventDateField.style.display = "block";
            } else {
                startEndFields.style.display = "block";
                eventDateField.style.display = "none";
            }
        });
    });

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


<?php echo $__env->make('admin.layouts.app', ['title' => 'Edit Event'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/event/edit.blade.php ENDPATH**/ ?>