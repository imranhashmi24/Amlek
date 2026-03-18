@php
    $title = isset($title) ? $title : __('Get Started with Your Service Request'); // Section title
    $route = isset($route) ? $route : 'our-service-request.store'; // Form submission route
    $service_id = isset($service_id) ? $service_id : 1; // Service ID
    $type =  isset($type) ? $type : "OurService"; // Service Type
    $model = isset($model) ? $model : "OurServiceForm";; // Model instance if editing
    $field = isset($field) ? $field : 'service_id'; // Additional fields if needed
    $button_text = isset($button_text) ?  $button_text : __('Submit Request'); // Button text
@endphp

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-2 col-md-8">
                <div class="section-title-form">
                    <h5>{{ $title }}</h5>
                </div>
            </div>
            <div class="col-12 offset-md-2 col-md-8">
                <form method="POST" action="{{ route($route) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service_id }}">
                    <input type="hidden" name="type" value="{{ $type }}">
                    @php
                        echo getForm($service_id, $model, $field);
                    @endphp
                    <button type="submit" class="btn btn-primary submit-btn">{{ $button_text }}</button>
                </form>
            </div>
        </div>
    </div>
</section>


@push('style')
    <style>

        .section-title-form {
            text-align: center;
            padding-top: 0.5rem;
            padding-bottom: 0.2rem;
            font-size: 1rem;
            font-weight: 600;
            background-color: #0D47A1 !important;
            color: #fff;
            margin-bottom: 2rem;
        }

        .submit-btn {
            margin-top: 2rem;
            padding: 0.5rem 2rem;
            background-color: #0D47A1 !important;
            color: #fff;
            border-radius: 0;
        }
    </style>
@endpush

