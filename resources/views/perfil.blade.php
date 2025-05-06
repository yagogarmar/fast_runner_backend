
@extends('layouts.app')
@section('title', 'Levels')
@section('content')

<body>
    <x-navbar :user="$user" />

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>

    <div class="cont_perfil">
        <div class="cont_pfp_perfil">
            <img onclick="update_pfp()" src="{{$user->pfp}}" alt="">
        </div>
        <div class="cont_info_perfil">
            <div>
                <h1>{{$user->username}}</h1>
                <h4>EMAIL</h4>
                <p>{{$user->email}}</p>
                <h4>ABOUT ME</h4>
                <p>{{$user->bio}}</p>
                
            </div>
            
        </div>
    </div>
    <input type="file" name="" id="foto_pfp" hidden>

<script src="{{ asset('js/marquee.js') }}"></script>
<script src="{{ asset('js/perfil.js') }}"></script>

@endsection