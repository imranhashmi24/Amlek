@extends('web.layouts.frontend', ['title' => 'Rehabilitation Eempowerment'])


@section('content')

    @include('sections.breadcrumb',['title' => 'Rehabilitation Eempowerment']);


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif


@endsection
