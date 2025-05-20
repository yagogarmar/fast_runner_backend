
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
<div class="info_global">
    <h1>TOP GLOBAL</h1>
</div>
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

<div class="info_global">
    <h3>¿Como se calcula?</h3>

    <p>Para calcular las puntuaciones usamos un sistema de z-score para garantizar la mayor precision a la hora de calcular las puntuaciones.</p>
    <p>Esta es la formula que se usa para hacer el calculo </p>
<h2>\( Z = \frac{x - \mu}{\sigma} \)</h2>
<p>donde:</p>
<ul>
  <li>\( x \) es el tiempo del jugador</li>
  <li>\( \mu \) es la media del nivel</li>
  <li>\( \sigma \) es la desviación estándar del nivel</li>
</ul>
<br>
<h5>¿Como se calcula la desviación estandar de un nivel?</h5>
<p>Esta fórmula mide cuánto se alejan los valores respecto a la media. Es fundamental para calcular el Z-score correctamente.</p>

<h4>    
    \[
    \sigma = \sqrt{ \frac{1}{n - 1} \sum_{i=1}^{n} (x_i - \bar{x})^2 }
    \]
</h4>
<p><strong>donde:</strong></p>
    <ul>
      <li><strong>\( \sigma \)</strong>: desviación estándar.</li>
      <li><strong>\( n \)</strong>: número total de valores.</li>
      <li><strong>\( x_i \)</strong>: cada valor individual (por ejemplo, el tiempo de un jugador).</li>
      <li><strong>\( \bar{x} \)</strong>: la media de todos los valores.</li>
    </ul>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async
  src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
</script>


<script src="{{ asset('js/global.js') }}"></script>

@endsection