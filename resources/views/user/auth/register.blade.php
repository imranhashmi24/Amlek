@extends('web.layouts.frontend',['title'=>'Sign In'])
@section('content')
@php
    $policyPages = getContent('policy_pages.element',false,null,true);
@endphp

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <h5 class="card-title text-center">@lang('Sign Up')</h5>
                    </div>
                    <div class="card-body px-4">
                        <form method="POST" action="{{ route('user.register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Username')</label>
                                        <input type="text" class="form-control checkUser" name="username"
                                            value="{{ old('username') }}" required>
                                        <small class="text-danger usernameExist"></small>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Email Address')</label>
                                        <input type="email" class="form-control checkUser" name="email"
                                            value="{{ old('email') }}" required>

                                            <small class="text-danger emailExist"></small>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Country')</label>
                                        <select name="country" class="form-select ">
                                            @foreach ($countries as $country)
                                                @if(app()->getLocale()=='en')
                                                <option value="{{ $country->id }}">{{ __($country->name) }}</option>
                                                @else
                                                <option value="{{ $country->id }}">{{ __($country->name_ar) }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Mobile Number')</label>
                                        <div class="input-group ">
                                            <input type="number" name="mobile" value="{{ old('mobile') }}"
                                                class="form-control  checkUser" required>
                                        </div>
                                        <small class="text-danger mobileExist"></small>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Password')</label>
                                        <input type="password"class="form-control  @if(gs('secure_password')) secure-password @endif" name="password" required>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Confirm Password')</label>
                                        <input type="password" class="form-control " name="password_confirmation" required>
                                    </div>
                                </div>

                                <x-captcha />

                                @if(gs()->agree)
                                <div class="col-12 pb-3">
                                    <div class="form-group">
                                        <input type="checkbox" id="agree" @checked(old('agree')) name="agree" required>
                                        <label for="agree">@lang('I agree with')</label> <span>@foreach($policyPages as $policy) <a href="{{ route('policy.pages',[slug($policy->data_values->title),$policy->id]) }}" target="_blank">{{ __($policy->data_values->title) }}</a> @if(!$loop->last), @endif @endforeach</span>
                                    </div>
                                </div>
                                @endif
                                <div class="col-12 pb-3">
                                    <div class="form-group">
                                        <button type="submit" id="recaptcha" class="btn btn-base w-100"> @lang('Sign Up')</button>
                                    </div>
                
                                    <p class="mb-0 text-center pt-3">@lang('Already have an account?') <a href="{{ route('user.login') }}">@lang('Sign In')</a></p>
                                </div>
                            </div>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@if(gs('secure_password'))
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif
@push('script')
    <script>
      "use strict";
        (function ($) {
            $('.checkUser').on('focusout',function(e){
          
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';

                if ($(this).attr('name') == 'email') {
                    var data = {email:value,_token:token}
                }
                if ($(this).attr('name') == 'username') {
                    var data = {username:value,_token:token}
                }

                if ($(this).attr('name') == 'mobile') {
                    var data = {mobile:value,_token:token}
                }


                
                $.post(url,data,function(response) {
                  if(response.data != false){
                    $(`.${response.type}Exist`).text(`${response.type} already exists`);
                  }else{
                    $(`.${response.type}Exist`).text('');
                  }
                });


            });
        })(jQuery);

    </script>
@endpush
