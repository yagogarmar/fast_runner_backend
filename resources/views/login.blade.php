
@extends('layouts.app')
@section('title', 'Login')
@section('content')
<body>

    <div class="cont_global">
        <div class="cont_logo">
            <div class="cont_degradado">
               
            </div>
        </div>
        <div class="cont_login">
            <h1>LOGIN</h1>
            <input type="text" id="username" class="loginInput" placeholder="USERNAME">
            <input type="password" id="password" class="loginInput" placeholder="PASSWORD">
            <button onclick="login()" class="loginButton">CONTINUE</button>
            <button onclick="login()" class="goregisterButton">REGISTER</button>
        </div>
    </div>
    
    


</body>
<script src="{{ asset('js/login.js') }}"></script>
@endsection