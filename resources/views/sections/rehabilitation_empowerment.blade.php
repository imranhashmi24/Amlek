@php
    $rehabilitationContent = getContent('rehabilitation_empowerment.content', true);
@endphp

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <div class="rehabilitation-image">
                    <img src="{{ getImage('assets/images/frontend/rehabilitation_empowerment/' . @$rehabilitationContent->data_values->image) }}"
                        alt="image">
                </div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <div class="rehabilitation-text">
                    <p>
                        {{ $rehabilitationContent->lang('description') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('style')
    <style>
        .rehabilitation-text p {
            line-height: 28px;
        }
        .rehabilitation-image img{
            width: 100%;
        }
    </style>
@endpush
