@extends('web.layouts.frontend', ['title' => 'Social Investment'])


@section('content')

    @include('sections.social_investment_banner')
    @include('sections.social_investment_service')
    {{-- @include('sections.social_investment_sector') --}}
    @include('sections.service_request')


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif


@endsection
