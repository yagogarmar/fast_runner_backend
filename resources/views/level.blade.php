
@extends('layouts.app')
@section('title', 'Levels')
@section('content')

<body>
    <x-navbar></x-navbar>

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>
    <div class="cont_level_content">
        <div class="cont_level_record">
            <div class="record">

            </div>
        </div>
        <div class="cont_tabla_level">
    
        </div>
    
    </div>

</body>

<script src="{{ asset('js/marquee.js') }}"></script>

@endsection