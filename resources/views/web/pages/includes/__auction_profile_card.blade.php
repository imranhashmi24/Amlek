<div class="company-card">
    <img src="{{ asset('assets/web/demo-images/profile_card.png') }}" alt="profile-card">
    <div class="logo">
        <img src="{{ asset('assets/web/demo-images/logo.png') }}" alt="logo">
    </div>
    <div class="content">
        <div class="mb-5">
            <!--<h3>{{ __(gs('site_name')) }}</h3>-->
            <h3>@lang('Inspirational Real Estate Company')</h3>
        </div>

        <div>
            <h3 class="text-muted">@lang('Communication')</h3>
            <hr>
        </div>

        <div>
            <h3>+9660550217734</h3>
        </div>

        <div class="mt-2">
            <a href="tel:+9660550217734" class="mt-3 btn btn-share w-100">
                <i class="fab fa-whatsapp"></i>
                <span>@lang('Massaging by Whatsapp')</span>
            </a>
            <a href="{{ route('request.get.auction_request', $auction->id) }}" class="mt-3 btn w-100"
                style="background-color: #39004E !important; color: #FFF">@lang('Request')</a>
        </div>
    </div>
</div>
