@extends('admin.layouts.app', ['title' => 'Property Type'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <div class="card-list">
                                        <span>@lang('Name')</span>
                                        <b> {{ $propertyType->lang('name') }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b>  @php echo $propertyType->statusBadge @endphp </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="property-image">
                                <img src="{{ getImage(getFilePath('propertyType') . '/' . $propertyType->icon, getFileSize('propertyType')) }}"
                                            alt="@lang('Image')">
                            </div>
                        </div>
                    </div>

                    <div class="my-3 row">
                        @include('admin.property_type.include.form_generate')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-form-generator />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <a href="{{ route('admin.property.type.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise pe-1"></i>
            @lang('Back')</a>
    </div>
@endpush



@push('style')
    <style>
         .card-body .card-list {
            display: flex;
            padding: 8px;
            flex-wrap: nowrap;
            border-bottom: 1px solid #cccccc;
            justify-content: space-between;

        }

        .card-body .card-list:last-child {
            border-bottom: none;
        }

        .property-image {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .property-image img{
            width: 170px;
            height: 170px;
            display: flex;
            border: 1px solid #cccccc;
            border-radius: 5px;
            overflow: hidden;
        }
    </style>
@endpush



@push('script')
    <script>
        "use strict"
        var formGenerator = new FormGenerator();
        formGenerator.totalField = {{ $form ? count((array) $form->form_data) : 0 }}
    </script>

    <script src="{{ asset('assets/global/js/form_actions.js') }}"></script>
@endpush

