
@extends('layouts.app')
@section('title', 'Login')
@section('content')

<body>
    <x-navbar :user="$user" />

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>
    <p>{{$user}}</p>

</body>

<script src="{{ asset('js/marquee.js') }}"></script>

@endsection