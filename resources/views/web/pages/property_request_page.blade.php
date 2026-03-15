@extends('web.layouts.frontend', ['title' => 'Property Request'])


@section('content')
<div class="container py-5">
    <div class="row">
        @foreach ($requestProperties as $property)
        <div class="my-2 col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card w-100 propertybox">
                <div class="property-image position-relative">
                    <img src="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}"
                        alt="@lang('Image')" class="card-img-top" alt="...">
                </div>

                <div class="card-body">
                    <h5 class="card-title property-title">
                        <a href="{{ route('propertyRequestDetails', $property->id) }}">
                            {{ $property->name }}
                        </a>
                    </h5>
                    <p class="card-text text-black-50 propery-location">
                        {{ app()->getLocale() == 'en' ? $property->country?->name : $property->country?->name_ar}} , {{ app()->getLocale() == 'en' ? $property->city?->name : $property->city?->name_ar}}
                    </p>
                    <p class="mt-4 mb-0 property-type-property">
                        <img src="{{ getImage(getFilePath('propertyType') . '/' . $property->propertyType->icon, getFileSize('propertyType')) }}"
                            alt="">
                        {{ app()->getLocale() == 'en' ? @$property->propertyType?->name : @$property->propertyType?->name_ar }}

                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        @if($requestProperties->hasPages())
            <div class="col-md-6">
                {{ $requestProperties->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
