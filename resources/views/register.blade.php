
@extends('layouts.app')
@section('title', 'Login')
@section('content')

<body class="loginbody">

    <div class="cont_global">

        <div class="cont_login">
            <h1>REGISTER</h1>
            <input type="text" id="username" class="loginInput" placeholder="USERNAME">
            <input type="email" id="email" class="loginInput" placeholder="EMAIL">
            <input type="password" id="password1" class="loginInput" placeholder="PASSWORD">
            <input type="password" id="password2" class="loginInput" placeholder="PASSWORD">

            <button onclick="register()" class="loginButton">CONTINUE</button>
            <a href="/login">
              <button onclick="" class="goregisterButton">RETURN</button>
            </a>
        </div>

        <div class="cont_logo">
          <div class="cont_degradado">
              <img src="{{ asset('assets/logo.svg') }}" alt="">


          </div>
      </div>
    </div>
    
    


</body>

<script src="{{ asset('js/register.js') }}"></script>

@endsection