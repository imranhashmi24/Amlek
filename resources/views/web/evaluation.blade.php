@extends('web.layouts.frontend', ['title' => 'Evaluation and studies'])


@section('content')

   @include('sections.evaluation_banner')
   @include('sections.evaluation_service')
   @include('sections.evaluation_plan')

    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif


@endsection
