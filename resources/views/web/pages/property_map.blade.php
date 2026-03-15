@extends('web.layouts.frontend', ['title' => 'Property Detail'])

@section('content')
    @include('sections.property_search')

    <section class="py-5 property property-bg-color">
        <div class="container">
            <div class="row">
                @include('web.component.property_tab')
                <div class="pb-3 col-12">
                    <div class="sort-property d-flex justify-content-between align-items-center">
                        <div>
                            <?php
                                $property_count = count($property_items);
                            ?>
                            <p class="m-0">@lang('Find') <b><?php echo $property_count; ?></b> @lang('properties')</p>
                        </div>
                    </div>
                </div>

                @if ($property_items)
                    @include('web.component.all_property_map')
                @else
                    <h4 class="py-5 text-center">@lang('Property not found')</h4>
                @endif

            </div>
        </div>
    </section>


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif

    @include('sections.advance_search')

@endsection


@push('style')
<style>
    .sort-links {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #faf5f5; /* Light gray background */
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sort-links a {
        text-decoration: none;
        color: #333;
        padding: 8px 16px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .sort-links a.active{
        background-color: #39004e;
        color: #fff;
    }

    .sort-links a:hover {
        background-color: #39004e;
        color: #fff;
    }
</style>
@endpush

@push('script')
    <script>
        $('.price-select').on('change', function() {
            let link = $(this).find('option:selected').data('link');
            if (link) {
                window.location.href = link;
            }
        })
    </script>
@endpush


@push('script')
    <script>
        $(document).on('click', '.favorite', function(e){
            e.preventDefault();
            var $this = $(this);
            var property_id = $(this).attr('data-property');
            var url = "{{ route('favorite.store') }}";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type : "POST",
                url  : url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    property_id: property_id
                },
                success: function(res){
                    if (res.status === true) {
                        notify('success', res.message);
                        $this.find('i.fa').addClass('text-danger');
                    }

                    if (res.status === false) {
                        notify('success', res.message);
                        $this.find('i.fa').removeClass('text-danger');
                    }

                },
                error: function(xhr, textStatus, errorThrown) {
                    window.location.href = "user/login";
                }
             });
        })
    </script>
@endpush



