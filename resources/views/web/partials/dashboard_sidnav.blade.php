
@php
    $lang = Session::get('lang');
@endphp

<div class="float-left d-mobile-close d-mobile-toggle">
    <i class="bi bi-x-circle"></i>
</div>
<ul class="sm-ul">
    <li>
        <a href="{{ route('user.home') }}" class="{{ menuActive('user.home') }}">
            <i class="bi bi-speedometer2 me-1"></i>
            @lang('Dashboard')
        </a>
    </li>
    <li class="d-subbtn {{menuActive('user.properties*')}}">
        <a href="javascript:void(0)" class="aaaa">
            <i class="bi bi-houses me-1"></i>
            @lang('Properties')
        </a>
        <div class="d-submenu {{menuActive(['user.properties.index','user.properties.pending','user.properties.published','user.properties.review','user.properties.rejected','user.properties.create'])}}">
            <a href="{{route('user.properties.index')}}" class="{{menuActive('user.properties.index')}}">
                <i class="fa-regular fa-circle"></i>
                @lang('All')
            </a>
            <a href="{{route('user.properties.pending')}}" class="{{menuActive('user.properties.pending')}}">
                <i class="fa-regular fa-circle"></i>
                @lang('Pending')
            </a>
            <a href="{{route('user.properties.published')}}" class="{{menuActive('user.properties.published')}}">
                <i class="fa-regular fa-circle"></i>
                @lang('Published')
            </a>
            <a href="{{route('user.properties.review')}}" class="{{menuActive('user.properties.review')}}">
                <i class="fa-regular fa-circle"></i>
                @lang('Reviews')
            </a>
            <a href="{{route('user.properties.rejected')}}" class="{{menuActive('user.properties.rejected')}}">
                <i class="fa-regular fa-circle"></i>
                @lang('Rejected')
            </a>
            <a href="{{route('user.properties.create')}}" class="{{menuActive('user.properties.create')}}">
                <i class="fa-regular fa-circle"></i>
                @lang('Add')
            </a>
        </div>
    </li>
    <li>
        <a href="{{ route('user.property.request') }}" class="{{ menuActive('user.property.request') }}">
            <i class="bi bi-house-check me-1"></i>
            @lang('Property Request')
        </a>
    </li>
    <li>
        <a href="{{ route('user.finance.request') }}" class="{{ menuActive('user.finance.request') }}">
            <i class="bi bi-cash-coin me-1"></i>
            @lang('Finance Request')
        </a>
    </li>
    <li>
        <a href="{{ route('user.marketing.request') }}" class="{{ menuActive('user.marketing.request') }}">
            <i class="bi bi-shop me-1"></i>
            @lang('Marketing Request')
        </a>
    </li>
    <li>
        <a href="{{ route('user.service.request') }}" class="{{ menuActive('user.service.request') }}">
            <i class="bi bi-gear me-1"></i>
            @lang('Service Request')
        </a>
    </li>
    <li>
        <a href="{{ route('user.favorite.index') }}" class="{{ menuActive('user.favorite.index') }}">
            <i class="bi bi-heart me-1"></i>
            @lang('Favorite')
        </a>
    </li>
    <li>
        <a href="{{ route('user.profile.setting') }}" class="{{ menuActive('user.profile.setting') }}">
            <i class="fa-regular fa-user me-1"></i>
            @lang('Profile Settings')
        </a>
    </li>
    <li>
        <a href="{{ route('support.index') }}" class="{{ menuActive('support.index') }}">
            <i class="bi bi-envelope me-1"></i>
            @lang('Support')
        </a>
    </li>
    <li>
        <a href="{{ route('user.change.password') }}" class="{{ menuActive('user.change.password') }}">
            <i class="bi bi-lock me-1"></i>
            @lang('Change Password')
        </a>
    </li>
    <li>
        <a href="{{ route('user.logout') }}">
            <i class="bi bi-box-arrow-right me-1"></i>
            @lang('Logout')
        </a>
    </li>
</ul>
