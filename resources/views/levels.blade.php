
@extends('layouts.app')
@section('title', 'Levels')
@section('content')

<body>
    <x-navbar></x-navbar>

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>

    <div class="cont_levels">
        @foreach ($levels as $level)
            <div class="level">
                <a href="levels/{{$level->id}}" class="level_url">
                    <p>
                        {{$level->name}}
                    </p>
                </a>
            </div>
        @endforeach
    </div>

</body>

<script src="{{ asset('js/marquee.js') }}"></script>

@endsection