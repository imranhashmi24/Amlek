<div class="my-2 col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="card w-100 propertybox">
        <div class="property-image position-relative">
            <img src="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>"
                alt="<?php echo app('translator')->get('Image'); ?>" class="card-img-top" alt="...">

            <div class="top-0 p-2 position-absolute end-0 propertyimageicon ">
                <ul>
                    <li><a href="" class="px-2 py-1 mb-3 text-white bg-dark" data-bs-toggle="modal"
                            data-bs-target="#shareModal"> <i class="fa fa-share-alt"></i> </a>
                    </li>
                    <li><a href="javascript::void(0)" class="px-2 py-1 mb-3 text-white bg-dark favorite"
                            data-property="<?php echo e($property->id); ?>">
                            <i
                                class="fa fa-heart <?php echo e(!empty($property->favorite) && $property->favorite->user_id == auth()->user()->id ? 'text-danger' : ''); ?>"></i>

                            </i>
                        </a></li>
                    <li><a href="<?php echo e(route('property.detail', $property->slug)); ?>" class="px-2 py-1 text-white bg-dark">
                            <i class="fa fa-eye"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card-body">
            <h5 class="card-title property-title">
                <a href="<?php echo e(route('property.detail', $property->slug)); ?>">
                    <?php echo e($property->lang('title')); ?>

                </a>
            </h5>
            <p class="card-text text-black-50 propery-location">
                <?php echo e($property->country->lang('name')); ?> , <?php echo e($property->city->lang('name')); ?>

            </p>
            
            <?php if($property->property_type_id==1 || $property->property_type_id==7 || $property->property_type_id==12 || $property->property_type_id==13): ?>
            <div class="icon-info d-flex d-none">
                <div class="w-25">
                    <i class="fa fa-bed"></i> <?php echo e($property->bed_rooms); ?>

                </div>
                <div class="w-25">
                    <i class="fa fa-bath"></i> <?php echo e($property->bath_rooms); ?>

                </div>
                <div class="w-25">
                    <i class="fa fa-couch"></i> <?php echo e($property->living_room); ?>

                </div>
                <div class="w-25">
                    <i class="fa fa-hotel"></i> <?php echo e($property->guest_room); ?>

                </div>
            </div>
            <?php endif; ?>
            
            
            <p class="mt-4 mb-0 property-type-property">
                <img src="<?php echo e(getImage(getFilePath('propertyType') . '/' . $property->propertyType->icon, getFileSize('propertyType'))); ?>"
                    alt="">
                <?php echo e(@$property->propertyType->lang('name')); ?>


            </p>
        </div>
        <div class="bg-transparent card-footer">
            <div class="flex-wrap price d-flex justify-content-between">
                <div>
                    <a href=""  data-bs-toggle="modal"
                    data-bs-target="#propertyRequestForm" class="btn" style="background-color: #39004E !important; color: #FFF"> <?php echo app('translator')->get('Request'); ?> </a>
                </div>
                <div class="text-end d-flex">
                    <?php if($property->user_id): ?>
                    <a href="<?php echo e(url('user/message', $property->user_id)); ?>" class="gap-2 mr-2 text-success fw-bold d-flex align-items-center">
                        <i class="mt-1 fa-regular fa-message fs-3" style="margin-right: 15px !important"></i>
                    </a>
                    <?php endif; ?>
                    <a href="https://wa.me/+9660550217734" class="gap-2 text-success fw-bold d-flex align-items-center">

                        <i class="fa-brands fa-whatsapp whatsapp-property"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('web.component.property_request_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('sections.share_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH /home/amlaek/public_html/resources/views/web/component/singleproperty.blade.php ENDPATH**/ ?>