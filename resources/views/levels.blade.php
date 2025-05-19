
@extends('layouts.app')
@section('title', 'FasrRunner - Levels')
@section('content')

<body>
    <x-navbar :user="$user" />

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>

    <div class="cont_padre_levels">
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

        <div class="cont_ranking_global">
            <div onclick="changeUrl('/ranking/global')">
                <h2>RANKING GLOBAL</h2>
            </div>
        </div>
    </div>



</body>
<script>    
    function changeUrl(url){
        window.location = window.origin + url;
    }
</script>
<script src="{{ asset('js/marquee.js') }}"></script>

@endsection