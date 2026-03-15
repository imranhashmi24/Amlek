@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/global/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/custom.css') }}">
@endpush

@push('style')
<style>
    .property-image img{
        height: 200px !important;
    }
    .body-content{
        margin-bottom: 7px !important;
        height: 150px !important;
        overflow: hidden;
    }
</style>
@endpush


@push('script-lib')
    <script src="{{ asset('assets/global/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/web/js/slick.min.js') }}"></script>
@endpush

@push('script')
    <script>
        $('.flan-view').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });

        $(".clickType2").click(function(){
            var type = $(this).val();
            // var slug = "{{ @$auction->slug }}";
            var slug = encodeURIComponent("{{ @$auction->slug }}");

            var url = "{{ route('auction.details', ['slug' => ':slug']) }}";

            url = url.replace(':slug', slug);

            var formData = new FormData();

            formData.append('type', type);

            var form = document.createElement('form');
            form.setAttribute('method', 'get');
            form.setAttribute('action', url);

            for (var pair of formData.entries()) {
                var input = document.createElement('input');
                input.setAttribute('type', 'hidden');
                input.setAttribute('name', pair[0]);
                input.setAttribute('value', pair[1]);
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        });

    </script>
@endpush
