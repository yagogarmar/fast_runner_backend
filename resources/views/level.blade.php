@extends('layouts.app')
@section('title', 'Levels')
@section('content')

<body>
    <x-navbar :user="$user" />

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>
    <div class="cont_level_content">
        <div class="cont_level_record">
            <div class="record">
                <h1>RECORD</h1>
                <img id="pfp_record" src="" alt="">
                <h3 id="usernameRecord"></h3>
                <h1 id="timeRecord" class="time_record"></h1>
                <h4 id="fecha_record"></h4>
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

    <div class="cont_comentarios">
        <div class="cont_enviar_comentario">
            <img src="{{asset($user->pfp)}}" alt="" class="pfp_enviar_comentario">
            <div>
                <textarea name="" id="text_area_comment"  oninput="autoExpand(this)"></textarea>
                <button onclick="sendComment()" class="button_enviar_coment">COMENTAR</button>
            </div>
        </div>
        <div class="cont_comentarios_coments" id="comentarios">
            @foreach ($comentarios as $comentario)
            <div id="completo-{{$comentario->id}}" class="comentario_compelto">
                <div class="comentario">
                    <div class="info_user_comentario">
                        <img src="{{$comentario->user->pfp}}" alt="">
                        <h2>{{$comentario->user->username}}</h2>
                        <p>{{$comentario->time_string}}</p>
                    </div>
                    <p>{{$comentario->content}}</p>
                    <div onclick="clicButtonResponder('{{'completo-'.$comentario->id}}', '{{$user->pfp}}', '{{$comentario->id}}')" class="cont_responder">
                        <img src="{{asset('/assets/responder.svg')}}" alt="">
                        <p>Responder</p>
                    </div>
                </div>
                <p class="expand_repleis" onclick="showReplies('.replie_comment-{{$comentario->id}}')" id=".replie_comment-{{$comentario->id}}">Press to show replies</p>
                @foreach ($comentario->replies as $replie)
                    <div class="cont_replie replie_comment-{{$comentario->id}}" >
        
                        <div class="linea_replie" onclick="hideReplies('.replie_comment-{{$comentario->id}}')">
        
                        </div>
                        <div class="replie">
                            <div class="info_user_comentario">
                                <img src="{{$replie->user->pfp}}" alt="">
                                <h2>{{$replie->user->username}}</h2>
                                <p>{{$replie->time_string}}</p>
                            </div>
                            <p>{{$replie->content}}</p>
                        </div>
                        
                    </div>


                @endforeach
            </div>
            
        @endforeach
        </div>
        

    </div>


</body>

<script src="{{ asset('js/marquee.js') }}"></script>
<script src="{{ asset('js/level.js') }}"></script>
<script src="{{ asset('js/comments.js') }}"></script>

@endsection