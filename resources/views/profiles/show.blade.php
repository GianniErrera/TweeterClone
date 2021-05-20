@extends('layouts.empty_template')

@section('content')
<div>
    <h3>profile page for {{ $user->name }}</h3>

    <hr>

    @include('_timeline', [
        'tweets' => $user->tweets
    ])
</div>
@endsection
