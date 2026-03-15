<?php
$propertySearchContent = getContent('property_search.content', true);
$propertyTypes = App\Models\PropertyType::active()->with('subproperty_types')->get();
$ocountries = App\Models\Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
$countries = sortOrder($ocountries);
?>

<section class="py-3 py-lg-5 home-section"
    style="background-image: url(<?php echo e(getImage('assets/images/frontend/property_search/' . @$propertySearchContent->data_values->background_image, '1900x250')); ?>)">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-10">
                <h5 class="text-center text-dark">
                    <?php echo $propertySearchContent->lang('title') ?>
                </h5>
            </div>
        </div>
        <div class="mt-5 property-search">
            <form action="<?php echo e(route('property')); ?>" method="GET">
                <div class="card">
                    <div class="p-3 card-body p-md-4">
                        <div class="d-flex property-search-box">
                            <input type="hidden" name="tab" value="list">
                            <div class="col-2">
                                <select name="purpose" class="form-select">
                                    <option value="Purchase" <?php if(urldecode(request('purpose'))=='Purchase' ): echo 'selected'; endif; ?>>
                                        <?php echo app('translator')->get('Purchase'); ?></option>
                                    <option value="Sale" <?php if(urldecode(request('purpose'))=='Sale' ): echo 'selected'; endif; ?>>
                                        <?php echo app('translator')->get('Sale'); ?></option>
                                    <option value="Kissing" <?php if(urldecode(request('purpose')) == 'Kissing'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Kissing'); ?></option>
                                    <option value="Exit" <?php if(urldecode(request('purpose')) == 'Exit'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Exit'); ?></option>
                                    <option value="Faltering" <?php if(urldecode(request('purpose')) == 'Faltering'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Faltering'); ?></option>
                                    <option value="Selling" <?php if(urldecode(request('purpose')) == 'Selling'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Selling'); ?></option>
                                    <option value="Buying" <?php if(urldecode(request('purpose')) == 'Buying'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Buying'); ?></option>
                                    <option value="Establishing" <?php if(urldecode(request('purpose')) == 'Establishing'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Establishing'); ?></option>
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="property_type" class="form-select">
                                    <option value=""><?php echo app('translator')->get('Type'); ?></option>
                                    <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($propertyType->id); ?>"
                                        <?php if(request('property_type')==$propertyType->id): echo 'selected'; endif; ?>
                                        data-subpropertytypes="<?php echo e($propertyType->subproperty_types); ?>">
                                        <?php echo e($propertyType->lang('name')); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="subproperty_type_id" class="form-select">
                                    <option value=""><?php echo app('translator')->get('Sub-type'); ?></option>
                                </select>
                            </div>

                            <div class="col-2">
                                <select name="country_id" class="form-select">
                                    <option value=""> <?php echo app('translator')->get('Country'); ?> </option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>" <?php if(request('country_id')==$country->id): echo 'selected'; endif; ?>
                                        data-cities="<?php echo e($country->city); ?>">
                                        <?php echo e($country->lang('name')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="city_id" class="form-select">

                                </select>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="search-btn"> <i class="mx-1 fa fa-search"></i> <?php echo app('translator')->get('Search'); ?> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div
                class="my-3 text-end text-dark advance-search-btn"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasAdvanceSearch" aria-controls="offcanvasSearchLabel">
                <i class="mx-1 fa fa-filter"></i>
                <?php echo app('translator')->get('Advance Search'); ?>
            </div>
        </div>

    </div>
    </div>
</section>

<?php $__env->startPush('style'); ?>
<style>
    .property-search {
        max-width: 100%;
        margin: 0 auto;
    }

    .property-search-box {
        display: flex;
        gap: 10px;
        flex-wrap: nowrap;
    }

    .property-search-box>div {
        min-width: 200px;
    }

    .property-search-box>div>select {
        width: 100%;
    }

    .property-search-box>div button {
        width: 70%;
        background: var(--bgc);
        color: var(--theme-color);
        height: 100%;
        padding: 10px;
        border-radius: 5px;
    }

    .advance-search-btn {
        margin-right: 25px !important;
        cursor: pointer;
    }

    @media(max-width: 575px) {
        
        .property-search-box {
            flex-direction: column;
        }
        
        .property-search-box>div {

            min-width: inherit;
            width: 100%;
        }

        .property-search-box>div button {
            width: 100%;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $('[name=country_id]').on('change', function() {
        var cities = $(this).find('option:selected').data('cities');
        var option = [`<option value=""><?php echo app('translator')->get('City'); ?></option>`];
        $.each(cities, function(index, value) {
            var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;
            option += "<option value='" + value.id + "' " + (value.id == "<?php echo e(request('city_id')); ?>" ?
                "selected" : "") + ">" + name + "</option>";
        });
        $('select[name=city_id]').html(option);
    }).change();
    $('[name=property_type]').on('change', function() {
        var subpropertyTypes = $(this).find('option:selected').data('subpropertytypes');
        var option = '<option value="">' + "<?php echo app('translator')->get('Sub-type'); ?>" + '</option>';
        $.each(subpropertyTypes, function(index, value) {
            var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;
            option += "<option value='" + value.id + "'" + (value.id ==
                    "<?php echo e(request('subproperty_type_id')); ?>" ? " selected" : "") + ">" + name +
                "</option>";
        });
        $('select[name=subproperty_type_id]').html(option);
    }).change();
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/amlaek/public_html/resources/views/sections/property_search.blade.php ENDPATH**/ ?>