
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
                <h1>RECORD</h1>
                <img id="pfp_record" src="{{asset('/assets/pfp.png')}}" alt="">
                <h3 id="usernameRecord">Lorem ipsum</h3>
                <h1 id="timeRecord" class="time_record">03:34:02</h1>
                <h4 id="fecha_record">19/03/2025</h4>
            </div>
        </div>
        <div class="cont_tabla_level">
            <h1>LVL00</h1>
            <div class="tabla">
                <div class="titulos_tabla">
                    <div class="col-2">
                        <h3>TOP</h3>
                    </div>
                    <div class="col-4">
                        <h3>PLAYER</h3>
                    </div>
                    <div class="col-3">
                        <h3>TIME</h3>
                    </div>
                    <div class="col-3">
                        <h3>DATE</h3>
                    </div>

                </div>
                <div id="filas" class="filas">
                    
                </div>
                
            </div>
            <div class="cont_paginador">
                <div class="paginador">

                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('js/marquee.js') }}"></script>
<script src="{{ asset('js/level.js') }}"></script>

@endsection