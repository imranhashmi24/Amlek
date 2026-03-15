<div class="my-2 col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="card w-100 propertybox">
        <div class="property-image position-relative">
            <img src="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}"
                alt="@lang('Image')" class="card-img-top" alt="...">

            <div class="top-0 p-2 position-absolute end-0 propertyimageicon ">
                <ul>
                    <li><a href="" class="px-2 py-1 mb-3 text-white bg-dark" data-bs-toggle="modal"
                            data-bs-target="#shareModal"> <i class="fa fa-share-alt"></i> </a>
                    </li>
                    <li><a href="javascript::void(0)" class="px-2 py-1 mb-3 text-white bg-dark favorite"
                            data-property="{{ $property->id }}">
                            <i
                                class="fa fa-heart {{ !empty($property->favorite) && $property->favorite->user_id == auth()->user()->id ? 'text-danger' : '' }}"></i>

                            </i>
                        </a></li>
                    <li><a href="{{ route('property.detail', $property->slug) }}" class="px-2 py-1 text-white bg-dark">
                            <i class="fa fa-eye"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card-body">
            <h5 class="card-title property-title">
                <a href="{{ route('property.detail', $property->slug) }}">
                    {{ $property->lang('title') }}
                </a>
            </h5>
            <p class="card-text text-black-50 propery-location">
                {{$property->country->lang('name')}} , {{$property->city->lang('name')}}
            </p>
            
            @if($property->property_type_id==1 || $property->property_type_id==7 || $property->property_type_id==12 || $property->property_type_id==13)
            <div class="icon-info d-flex d-none">
                <div class="w-25">
                    <i class="fa fa-bed"></i> {{ $property->bed_rooms }}
                </div>
                <div class="w-25">
                    <i class="fa fa-bath"></i> {{ $property->bath_rooms }}
                </div>
                <div class="w-25">
                    <i class="fa fa-couch"></i> {{ $property->living_room }}
                </div>
                <div class="w-25">
                    <i class="fa fa-hotel"></i> {{ $property->guest_room }}
                </div>
            </div>
            @endif
            
            
            <p class="mt-4 mb-0 property-type-property">
                <img src="{{ getImage(getFilePath('propertyType') . '/' . $property->propertyType->icon, getFileSize('propertyType')) }}"
                    alt="">
                {{ @$property->propertyType->lang('name') }}

            </p>
        </div>
        <div class="bg-transparent card-footer">
            <div class="flex-wrap price d-flex justify-content-between">
                <div>
                    <a href=""  data-bs-toggle="modal"
                    data-bs-target="#propertyRequestForm" class="btn" style="background-color: #39004E !important; color: #FFF"> @lang('Request') </a>
                </div>
                <div class="text-end d-flex">
                    @if($property->user_id)
                    <a href="{{ url('user/message', $property->user_id) }}" class="gap-2 mr-2 text-success fw-bold d-flex align-items-center">
                        <i class="mt-1 fa-regular fa-message fs-3" style="margin-right: 15px !important"></i>
                    </a>
                    @endif
                    <a href="https://wa.me/+9660550217734" class="gap-2 text-success fw-bold d-flex align-items-center">

                        <i class="fa-brands fa-whatsapp whatsapp-property"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('web.component.property_request_form')


@include('sections.share_section')


