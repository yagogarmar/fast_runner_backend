
@extends('layouts.app')
@section('title', 'FasrRunner - Home')
@section('content')

<body>
    <x-navbar :user="$user" />

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>
</body>

<script src="{{ asset('js/marquee.js') }}"></script>

<div class="cont_podio container-fluid">
    <div class="top2">
        <div class="cont_datos_top">
            <h1>TOP 2</h1>
            <img src="{{asset($top3[1]->user->pfp)}}" alt="">
            <h1>{{'@'.$top3[1]->user->username}}</h1>

        </div>
    </div>
    <div class="top1">
        <div class="cont_datos_top">
            <h1>TOP 1</h1>
            <img src="{{asset($top3[0]->user->pfp)}}" alt="">
            <h1>{{'@'.$top3[0]->user->username}}</h1>

        </div>
    </div>
    <div class="top3">
        <div class="cont_datos_top">
            <h1>TOP 3</h1>
            <img src="{{asset($top3[2]->user->pfp)}}" alt="">
            <h1>{{'@'.$top3[2]->user->username}}</h1>
        </div>
    </div>
</div>
<p></p>
<div class="cont_cont_tabla">
    <div class="cont_tabla">
            <div class="tabla">
                 <div class="titulos_tabla">
                    <div class="col-2">
                        <h3>TOP</h3>
                    </div>
                    <div class="col-4">
                        <h3>PLAYER</h3>
                    </div>
                    <div class="col-3">
                        <h3>SCORE</h3>
                    </div>
                    <div class="col-3">
                        <h3>ANTIGUEDAD</h3>
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




<script src="{{ asset('js/global.js') }}"></script>

@endsection