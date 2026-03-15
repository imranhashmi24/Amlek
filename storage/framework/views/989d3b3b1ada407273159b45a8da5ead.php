<?php
    $propertySearchContent = getContent('property_search.content', true);
    $propertyTypes = App\Models\PropertyType::active()->with('subproperty_types')->get();
    $ocountries = App\Models\Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
    $countries = sortOrder($ocountries);
?>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAdvanceSearch" aria-labelledby="offcanvasSearchLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php echo e(__('Search for Real Estate')); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body property-search-offcanvas">
        <form action="<?php echo e(route('property')); ?>" method="GET">
            <input type="hidden" name="tab" value="list">
            <div class="canvas-top">
                <div class="canvas--box">
                    <a href="javascript:void(0)">
                        <i class="text-white fa-solid fa-magnifying-glass fa-2x"></i>
                        <p><?php echo e(__('Search')); ?></p>
                    </a>
                </div>
                <div class="canvas--box">
                    <a href="#">
                        <i class="text-white fa-regular fa-map fa-2x"></i>
                        <p><?php echo e(__('Map')); ?></p>
                    </a>
                </div>
                <div class="canvas--box">
                    <a href="#">
                        <i class="text-white fa-solid fa-qrcode fa-2x"></i>
                        <p><?php echo e(__('QR Reader')); ?></p>
                    </a>
                </div>
            </div>
            <div class="custom--form">
                <div class="mb-4 row">
                    <div class="col-12 col-md-12">
                        <label class="form-label"><?php echo e(__('Time Period')); ?></label>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="text-center btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check visually-hidden" name="time_period" id="btnradio2"
                                value="All" autocomplete="off" <?php echo e(isset($_GET['time_period']) && $_GET['time_period'] == 'All' ? 'checked' : ''); ?>>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio2"><?php echo e(__('All')); ?></label>
                            <input type="radio" class="btn-check visually-hidden" name="time_period" id="btnradio1"
                                value="Newest" autocomplete="off" <?php echo e(isset($_GET['time_period']) && $_GET['time_period'] == 'Newest' ? 'checked' : ''); ?>>
                            <label class="text-center btn btn-outline-secondary custom-btn"
                                for="btnradio1"><?php echo e(__('Newest')); ?></label>

                        </div>
                    </div>
                </div>


                <div class="mb-4 row">
                    <div class="col-12 col-md-12">
                        <label class="form-label"><?php echo e(__('Purpose')); ?></label>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="text-center btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio21"
                                value="Purchase" autocomplete="off" <?php echo e(isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Purchase' ? 'checked' : ''); ?>>
                            <label class="text-center btn btn-outline-secondary custom-btn" for="btnradio21"> <?php echo app('translator')->get('Purchase'); ?></label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio22"
                                value="Sale" autocomplete="off" <?php echo e(isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Sale' ? 'checked' : ''); ?>>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio22"> <?php echo app('translator')->get('Sale'); ?></label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio23"
                                value="Kissing" autocomplete="off" <?php echo e(isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Kissing' ? 'checked' : ''); ?>>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio23"> <?php echo app('translator')->get('Kissing'); ?></label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio24"
                                value="Exit" autocomplete="off" <?php echo e(isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Exit' ? 'checked' : ''); ?>>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio24"> <?php echo app('translator')->get('Exit'); ?></label>
                            
                            
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio25"
                                value="Faltering" autocomplete="off" <?php echo e(isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Faltering' ? 'checked' : ''); ?>>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio25"> <?php echo app('translator')->get('Faltering'); ?></label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio26"
                                value="Selling" autocomplete="off" <?php echo e(isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Selling' ? 'checked' : ''); ?>>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio26"> <?php echo app('translator')->get('Selling'); ?></label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio27"
                                value="Buying" autocomplete="off" <?php echo e(isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Buying' ? 'checked' : ''); ?>>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio27"> <?php echo app('translator')->get('Buying'); ?></label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio24"
                                value="Establishing" autocomplete="off" <?php echo e(isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Establishing' ? 'checked' : ''); ?>>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio24"> <?php echo app('translator')->get('Establishing'); ?></label>
                            
                            
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label"><?php echo e(__('Choose the price per square meter or square foot')); ?></label>
                    <div class="gap-2 d-flex">
                        <div class="text-white input-group bg-secondary">
                            <span class="text-white btn btn-bg-color" type="button"
                                id="button-addon1"><?php echo e(__('From')); ?></span>
                            <input type="text" class="form-control" placeholder="" name="from_price" id="from_price"
                                value="<?php echo e(request()->has('from_price') ? request()->input('from_price') : ''); ?>"
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                        <div class="text-white input-group bg-secondary">
                            <span class="text-white btn btn-bg-color" type="button"
                                id="button-addon2"><?php echo e(__('To')); ?></span>
                            <input type="text" class="form-control" placeholder="" name="to_price" id="to_price"
                                value="<?php echo e(request()->has('to_price') ? request()->input('to_price') : ''); ?>"
                                aria-label="Example text with button addon" aria-describedby="button-addon2">
                        </div>
                    </div>
                </div>


                <div class="mb-4">
                    <label class="form-label"><?php echo e(__('Property Type')); ?></label>
                    <div>
                        <select name="property_type" id="search_property_type" class="form-control">
                            <option value="0"><?php echo e(__('Select one')); ?></option>
                            <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(app()->getLocale() == 'en'): ?>
                                    <option value="<?php echo e($property_type->id); ?>"  <?php echo e(isset($_GET['property_type']) && $_GET['property_type'] == $property_type->id ? 'selected' : ''); ?>>
                                        <?php echo e($property_type->name); ?>

                                    </option>
                                <?php else: ?>
                                    <option value="<?php echo e($property_type->id); ?>" <?php echo e(isset($_GET['property_type']) && $_GET['property_type'] == $property_type->id ? 'selected' : ''); ?>>
                                        <?php echo e($property_type->name_ar); ?>

                                    </option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="mb-4 row">
                    <div class="mb-4 col-12 col-md-12">
                        <label class="form-label"><?php echo e(__('Countries')); ?></label>
                        <div>
                            <select name="country_id" id="country_map" class="form-control country_map">
                                <option value="1"><?php echo e(__('Select one')); ?></option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(app()->getLocale() == 'en'): ?>
                                    <option
                                        value="<?php echo e($country->id); ?>"
                                        <?php echo e(isset($_GET['country_id']) && $_GET['country_id'] == $country->id ? 'selected' : ''); ?>

                                        data-cities="<?php echo e($country->city); ?>"
                                    ><?php echo e($country->name); ?></option>
                                    <?php else: ?>
                                    <option
                                        value="<?php echo e($country->id); ?>"
                                        <?php echo e(isset($_GET['country_id']) && $_GET['country_id'] == $country->id ? 'selected' : ''); ?>

                                        data-cities="<?php echo e($country->city); ?>"
                                    ><?php echo e($country->name_ar); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 col-12 col-md-12">
                        <label class="form-label"><?php echo e(__('City')); ?></label>
                        <div>
                            <select name="city_id" class="form-control">
                                <option value="1"><?php echo e(__('Select one')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button class="btn btn-bg-color w-100" style="background-color: #39004E !important; color: #FFF"
                            type="submit"> <i class="mr-3 bi bi-search"></i>
                            <?php echo e(__('Search')); ?></button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>


<?php $__env->startPush('style'); ?>
<style>
    .custom-btn {
        background-color: #39004E;
        color: #FFFFFF;
        padding: 14px !important;
    }

    .custom-btn.selected {
        background-color: #39004E;
    }

    .btn-label {
        display: block;
        padding-left: 5px !important;
    }

    .btn-bg-color {
        background-color: #39004E;
    }

    .canvas-top {
        display: flex;
        width: 100%;
        overflow-y: hidden;
        overflow-x: hidden;
    }

    .canvas--box {
        width: 120px !important;
        height: 80px;
        background-color: #39004E;
        border: none;
        border-radius: 8px;
        margin: 5px 8px;
        padding: 10px;
        text-align: center;
    }

    .canvas--box img {
        width: 40px;
        height: 40px;
        padding: 5px;
        border-radius: 8px;
        fill: #fff;
        background-color: #fff;
    }

    .canvas--box p {
        color: #fff;
        font-size: 14px;
    }

    .canvas-top:hover {
        overflow-x: auto;
    }

    .canvas-top::-webkit-scrollbar {
        width: 50px !important;
        height: 5px;
        border-radius: 5px;
    }

    .canvas-top::-webkit-scrollbar-track {
        width: 50px !important;
        background: #39004E;
        border-radius: 5px;
    }

    .canvas-top::-webkit-scrollbar-thumb {
        width: 50px !important;
        background: #39004E;
        border-radius: 5px;
    }

    .canvas-top::-webkit-scrollbar-thumb:hover {
        background: #39004E;
    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <script>

        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = `<option value=""><?php echo app('translator')->get('Select City'); ?></option>`;
            var locale = "<?php echo e(app()->getLocale()); ?>";

            $.each(cities, function(index, value) {
                var cityName = locale === 'ar' ? value.name_ar : value.name;
                option += `<option value="${value.id}" ${value.id == "<?php echo e(request('city_id')); ?>" ? "selected" : ""}>${cityName}</option>`;
            });

            $('select[name=city_id]').html(option);

        }).change();


        $('[name=property_type]').on('change', function() {

            var subpropertyTypes = $(this).find('option:selected').data('subpropertytypes');

            var option = '<option value="">' + "<?php echo app('translator')->get('Select Sub type'); ?>" + '</option>';

            $.each(subpropertyTypes, function(index, value) {
                var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;
                option += "<option value='" + value.id + "'" + (value.id == "<?php echo e(request('subproperty_type_id')); ?>" ? " selected" : "") + ">" + name + "</option>";
            });

            $('select[name=subproperty_type_id]').html(option);
        }).change();
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/advance_search.blade.php ENDPATH**/ ?>