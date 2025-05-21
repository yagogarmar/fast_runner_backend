
@extends('layouts.app')
@section('title', 'FasrRunner - Download')
@section('content')

<body>
    <x-navbar :user="$user" />

    <div class="marquee">
        <h1>FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER</h1>
    </div>

</body>

<script src="{{ asset('js/marquee.js') }}"></script>
<div class="cont_button_download">
    <div class="cont_down_but">
        <img class="img_sisteMA" src="{{asset('/assets/linux.png')}}" alt="">
        <a href="{{asset('/files/Fast_Runner_linux.zip')}}" download  class="button_downloas">
            <img src="{{asset('/assets/DOWN.svg')}}" alt="">
            <p>DOWNLAOD</p>
        </a>
    </div>

    <div class="cont_down_but">
        <img class="img_sisteMA" src="{{asset('/assets/win.png')}}" alt="">
        <a href="{{asset('/files/Fast_Runner_windows.zip')}}" download  class="button_downloas">
            <img src="{{asset('/assets/DOWN.svg')}}" alt="">
            <p>DOWNLAOD</p>
        </a>
    </div>

</div>
<div class="cont_notas_parche">
    <h1>VERSIÓN 0.1</h1>
    <P>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</P>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
</div>
@endsection