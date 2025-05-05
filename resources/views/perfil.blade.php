
@extends('layouts.app')
@section('title', 'Levels')
@section('content')

<body>
    <x-navbar></x-navbar>
    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>

    <div class="cont_perfil">
        <div class="cont_pfp_perfil">
            <img onclick="update_pfp()" src="{{asset('/img/pfp.png')}}" alt="">
        </div>
        <div class="cont_info_perfil">
            <div class="">
                <h1></h1>
            </div>
        </div>
    </div>
    <input type="file" name="" id="foto_pfp" hidden>

<script src="{{ asset('js/marquee.js') }}"></script>
<script src="{{ asset('js/perfil.js') }}"></script>

@endsection