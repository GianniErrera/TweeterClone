@extends('layouts.empty_template')


@section('content')

    @include('_publish-tweet-panel')

    <div class="border border-gray-300 rounded-lg">
        @foreach ($tweets as $tweet)
        @include('_tweet')
        @endforeach
    </div>

@endsection

