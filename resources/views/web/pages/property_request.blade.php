@extends('web.layouts.frontend',['title' => 'Property Request'])
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-5">
            <div class="card custom--card">
                <div class="card-header">
                    <h5 class="card-title"> @lang('Property Request') </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('propertyRequestStore')  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 co-12 col-md-6">
                                <label for="" class="form-label">@lang('homepage.name') <span class="text-danger fs-6">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="" placeholder="" required>
                            </div>
                            <div class="mb-3 co-12 col-md-6">
                                <label for="" class="form-label">@lang('homepage.mobilenumber')<span class="text-danger fs-6">*</span></label>
                                <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" id="" placeholder="" required>
                            </div>

                            <div class="mb-3 co-12 col-md-6">
                                <label for="" class="form-label">@lang('homepage.email') <span class="text-danger fs-6">*</span></label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="" placeholder="" required>
                            </div>

                            <div class="mb-3 co-12 col-md-6">
                                <label for="" class="form-label">@lang('homepage.country') <span class="text-danger fs-6">*</span></label>
                                <select name="country_id" id="country_id" class="form-select" aria-label="Default select example" required>
                                    <option value="">@lang('homepage.country')</option>
                                     @foreach ($countries as $country)
                                        <option {{ old('country_id') == $country->id ? "selected" : "" }} value="{{ $country->id  }}">
                                            @if(app()->getLocale()=='en')
                                            {{ $country->name  }}
                                            @else
                                            {{ $country->arabic_name  }}
                                            @endif
                                        </option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="mb-3 co-12 col-md-6">
                                <label for="" class="form-label">@lang('homepage.city') <span class="text-danger fs-6">*</span></label>
                                <select class="form-select city_id" name="city_id" id="city_id" aria-label="Default select example" required>
                                    <option value="">@lang('homepage.city')</option>

                                </select>
                            </div>
                            <div class="mb-3 co-12 col-md-6">
                                <label for="" class="form-label">@lang('homepage.region') <span class="text-danger fs-6">*</span></label>
                                <select class="form-select state_id" name="state_id" id="state_id" aria-label="Default select example" required>
                                    <option value="">@lang('homepage.region') </option>

                                </select>
                            </div>
                            <div class="mb-3 co-12 col-md-6">
                                <label for="" class="form-label">@lang('homepage.natureseeker') <span class="text-danger fs-6">*</span></label>
                                <select class="form-select natureofproperty" name="natureofproperty" aria-label="Default select example" required>
                                    <option value="@lang('homepage.natureseeker_p1')"> @lang('homepage.natureseeker_p1') </option>
                                    <option value="@lang('homepage.natureseeker_p2')"> @lang('homepage.natureseeker_p2') </option>
                                    <option value="@lang('homepage.natureseeker_p3')"> @lang('homepage.natureseeker_p3') </option>
                                </select>
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="">@lang('homepage.selectproperty')</label>
                                <select class="form-select property_type_id" name="property_type_id" id="property_type_id" aria-label="Default select example">
                                    <option value="">@lang('homepage.selectproperty')</option>
                                     @foreach ($propertytypes as $type)
                                        <option {{ old('property_type_id') == $type->id ? "selected" : "" }} value="{{ $type->id  }}">
                                            @if(app()->getLocale()=='en')
                                            {{ $type->name  }}
                                            @else
                                            {{ $type->name_ar  }}
                                            @endif
                                        </option>
                                     @endforeach
                                </select>
                            </div>

                            <div class="mb-3 co-12 col-md-12">
                                <label for="" class="form-label">@lang('homepage.propose_of_buying') <span class="text-danger fs-6">*</span></label>
                                <textarea name="purpose" id="purpose" rows="3" class="form-control" required>{{old('purpose')}}</textarea>
                            </div>

                            <div class="mb-3 co-12 col-md-12">
                                <label for="" class="form-label">@lang('homepage.preferred_area')</label>
                                <textarea name="area" id="area" rows="3" class="form-control">{{ old('area') }}</textarea>
                            </div>

                            <div class="mb-3 co-12 col-md-6">
                                <label for="" class="form-label">@lang('homepage.real_estate_budget')</label>
                                <input type="text" name="budget" value="{{ old('budget') }}" class="form-control" id="budget" placeholder="">
                            </div>
                            <div class="mb-3 co-12">
                                <button type="submit" class="submit-btn">  @lang('homepage.submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
