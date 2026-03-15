@extends('web.layouts.frontend', ['title' => 'Real estate financing'])


@section('content')

    @include('sections.finance_banner')
    @include('sections.finance_service')


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif


@endsection
