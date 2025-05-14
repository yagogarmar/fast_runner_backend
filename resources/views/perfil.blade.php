
@extends('layouts.app')
@section('title', 'Levels')
@section('content')

<body>
    <x-navbar :user="$user" />

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>

    <div class="cont_perfil_global">
        <div class="cont_info_perfil">
            <img class="pfp_perfil" onclick="update_pfp()" src="{{$user->pfp}}" alt="">
            <div class="mensaje_edit">
                <img src="{{asset('/assets/edit.svg')}}" alt="">
                <p>Pulsa para subir una foto</p>
            </div>
            <div class="info_perfil">
                <h1 class="usernmae_perfil">{{'@'.$user->username}}</h1>

                <h4>EMAIL</h4>
                <p>{{$user->email}}</p>
                <h4>ABOUT ME</h4>
                <p>{{$user->bio}}</p>
                    
                <div class="edit_button">
                    <img src="{{asset('/assets/edit.svg')}}" alt="">
            
                </div>
            </div>
            <div class="logout_button" onclick="logout()">
                <img src="{{asset('/assets/logout.svg')}}" alt="">
            
            </div>
        </div>

        <div class="cont_tabla_perfil">
            <h3 class="title_tabla_perfil">ULTIMOS INTENTOS</h3>

            <div class="tabla">
                <div class="titulos_tabla">

                    <div class="col-2">
                        <h3>LEVEL</h3>
                    </div>
                    <div class="col-3">
                        <h3>TIME</h3>
                    </div>
                    <div class="col-4">
                        <h3>DATE</h3>
                    </div>
                    <div class="col-3">
                        <h3>COMPLETED</h3>
                    </div>

                </div>
                <div id="filas" class="filas">
                    <div id="spinner" class="cont_spinner">
                        <div class=" spinner-custom  spinner-border " role="status">
                            
                        </div>
                    </div>
                </div> 
            </div>
            <div class="cont_paginador">
                <div class="paginador">
                    <div id="primera_pagina">
                        <img src="{{asset('/assets/flechas_izquierda.svg')}}" alt="">
                    </div>
                    <div id="pag_1" class="esfera_paginador2">
                        <p></p>
                    </div>
                    <div id="pag_2" class="esfera_paginador2">
                        <p></p>

                    </div>
                    <div id="pag_3" class="esfera_paginador2">
                        <p></p>

                    </div>
                    <div id="pag_4" class="esfera_paginador2">
                        <p></p>

                    </div>
                    <div id="pag_5" class="esfera_paginador2">
                        <p></p>

                    </div>
                    <div id="ultima_pagina">
                        <img src="{{asset('/assets/flechas_derecha.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <input type="file" name="" id="foto_pfp" hidden>

<script src="{{ asset('js/marquee.js') }}"></script>
<script src="{{ asset('js/perfil.js') }}"></script>

@endsection