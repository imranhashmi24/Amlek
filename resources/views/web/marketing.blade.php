@extends('web.layouts.frontend', ['title' => 'Marketing'])


@section('content')

    @include('sections.marketing_banner')

    @include('sections.marketing_service')


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif


@endsection
