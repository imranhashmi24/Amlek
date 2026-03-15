 @extends('web.layouts.frontend', ['title' => @$title])
@section('content')
    @include('sections.breadcrumb')
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ app()->getLocale() == 'en' ? $auction->title : $auction->title_ar }}</h3>
                    <p>{{ $title }} (@lang('Base'): {{ @$property->price }})</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('bidding.request.send') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ @$property->id }}" name="property_id">
                        <input type="hidden" value="{{ @$auction->id }}" name="auction_id">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Title') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Title') (@lang('Arabic'))<span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="title_ar" value="{{ old('title_ar') }}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3 ccol-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Amount')<span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="amount" value="{{ old('amount') }}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="mt-3 text-center col-12">
                                <button class="submit-btn w-100">@lang('Offer Send')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif


@endsection


@push('script')
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = [`<option value="">@lang('Select One')</option>`];
            $.each(cities, function(index, value) {
                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + ">" +
                    value.name + "</option>";
            });
            $('select[name=city_id]').html(option);
        }).change();
    </script>
@endpush
