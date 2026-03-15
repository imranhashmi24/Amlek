@extends('web.layouts.frontend', ['title' => 'Auctions and events'])


@section('content')

   @include('sections.auction_banner')
   @include('sections.auction_service')
   @include('sections.auction_methodology')
   @include('sections.auction_platforms')

    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif


@endsection
