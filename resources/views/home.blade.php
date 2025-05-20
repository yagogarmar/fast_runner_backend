
@extends('layouts.app')
@section('title', 'FasrRunner - Home')
@section('content')

<body>
    <x-navbar :user="$user" />

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>
    <div class="container-fluid row cont_home">
        <div class="col-5 contsec_home">
            <img src="{{asset('/assets/logo.svg')}}" alt="">
            <h1>FAST RUNNER</h1>
        </div>
        <div class="col-7 contsec_home">
            <iframe width="679" height="382" src="https://www.youtube.com/embed/YcykPL8vGGE" title="DEMO LARAVEL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>

    <div class="cont_info_home">
        <h4>¡Bienvenido a Fast Runner! ⚡ Supera 8 niveles de pura adrenalina, esquiva obstáculos y compite contra jugadores de todo el mundo. Consulta los rankings y demuestra que eres el más rápido. ¿Listo para la carrera?</h4>
        <div class="cont_redes">
            <img src="{{asset('/assets/youtube2.png')}}" alt="">
            <img src="{{asset('/assets/insta.svg')}}" alt="">
            <img src="{{asset('/assets/x.svg')}}" alt="">
        </div>
    </div>
</body>

<script src="{{ asset('js/marquee.js') }}"></script>

@endsection