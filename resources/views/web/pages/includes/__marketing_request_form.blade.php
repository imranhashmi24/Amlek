  <!-- Modal -->
  <div class="modal fade requestform" tabindex="-1" aria-labelledby="RequestForm" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form action="{{ route('marketingrequest.store') }}" method="POST">
        @csrf
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="RequestForm">{{ __('Request Service') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="mb-3 col-12">
                <label for="Name" class="form-label">{{ __('Name') }}</label>
                <input type="text" id="Name" name="name" value="{{ old('name') }}" class="form-control" aria-labelledby="Name" required>
            </div>
            <div class="mb-3 col-12">
                <label for="jobtitle" class="form-label">{{ __('Job Title') }}</label>
                <input type="text" id="jobtitle" name="jobtitle" value="{{ old('jobtitle') }}" class="form-control" aria-labelledby="Job Title" required>
            </div>
            <div class="mb-3 col-12">
                <label for="Company/Organization" class="form-label">{{ __('Company Organization') }}</label>
                <input type="text" id="organization" name="organization" value="{{ old('organization') }}" class="form-control" aria-labelledby="Company/Organization" required>
            </div>

            <div class="mb-2 col-6">
                <label class="form-label">{{ __('Country') }}</label>
                <select name="country_id"  class="form-select" required>
                    <option value="0">{{ __('Country') }}</option>
                    @foreach ($countries as $country)
                    <option {{ old('country_id') == $country->id ? "selected" : "" }} value="{{ $country->id }}" data-cities=@json($country->city)>
                        @if(app()->getLocale() == 'en')
                            {{ $country->name  }}
                        @else
                            {{ $country->name_ar   }}
                        @endif
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2 col-6">
                <label class="form-label">@lang('City')</label>
                <select name="city_id" class="form-control">
                    <option value="">{{ __('Select One') }}</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="Email" class="form-label">@lang('homepage.email')</label>
                <input type="email" id="Email" name="email" value="{{ old('email') }}" class="form-control" aria-labelledby="Email" required>
            </div>
            <div class="mb-2 col-6">
                <label for="mobile" class="form-label">@lang('homepage.mobilewhatsapp')</label>
                <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}" class="form-control" aria-labelledby="Mobile" required>
            </div>

            <div class="mb-2 col-12">
                <label for="description" class="form-label">@lang('homepage.activity')</label>
                <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
            </div>
        </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> @lang('homepage.sendrequest')</button>
        </div>
    </form>
    </div>
    </div>
</div>
