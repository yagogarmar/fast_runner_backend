
@extends('layouts.app')
@section('title', 'Login')
@section('content')

<body class="loginbody">

    <div class="cont_global">
        <div class="cont_logo">
            <div class="cont_degradado">
                <img src="{{ asset('assets/logo.svg') }}" alt="">


            </div>
        </div>
        <div class="cont_login">
            <h1>LOGIN</h1>
            <input type="text" id="username" class="loginInput" placeholder="USERNAME">
            <input type="password" id="password" class="loginInput" placeholder="PASSWORD">
            <p class="mensaje_error_login" id="mensaje_error">La contraseña o el usuario son incorrectos</p>
            <button onclick="login()" class="loginButton">CONTINUE</button>
            <a href="/register">
              <button  class="goregisterButton">REGISTER</button>
            </a>
        </div>
    </div>
    
    


</body>

<script src="{{ asset('js/login.js') }}"></script>
<script>
  const texto = "FAST RUNNER";
  const velocidad = 2.5; // píxeles por frame
  const frecuencia = 1500; // milisegundos entre cada texto nuevo

  function crearTexto() {
    const div = document.createElement("div");
    div.className = "texto";
    div.textContent = texto;
    div.style.top = "-100px"; // Empieza fuera de la pantalla (arriba)
    document.body.appendChild(div);

    function mover() {
      const top = parseFloat(div.style.top);
      if (top < window.innerHeight) {
        div.style.top = (top + velocidad) + "px";
        requestAnimationFrame(mover);
      } else {
        div.remove(); // eliminar al salir
      }
    }
    mover();
  }

  // Mostrar uno al entrar
  //crearTexto();

  // Repetir cada cierto tiempo
  //setInterval(crearTexto, frecuencia);
</script>
@endsection