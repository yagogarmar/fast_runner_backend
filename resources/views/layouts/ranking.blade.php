@extends('layouts.app')
@section('title', 'Login')
@section('content')
<body>
<div class="global-ranking">
    <header class="ranking-header">
        <h1 class="title">TOP GLOBAL</h1>
        <input type="text" class="search-bar" placeholder="🔍 Buscar...">
    </header>

    <div class="ranking-table">
        <table>
            <thead>
                <tr>
                    <th>TOP</th>
                    <th>PLAYER</th>
                    <th>PUNTOS</th>
                    <th>TOP</th>
                    <th>PLAYER</th>
                    <th>PUNTOS</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td><img src="/images/avatar.png" class="avatar"> Lorem ipsum</td>
                        <td>8.845</td>
                        <td>{{ $i + 5 }}</td>
                        <td><img src="/images/avatar.png" class="avatar"> Lorem ipsum</td>
                        <td>8.845</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <a href="#" class="page">&lt;</a>
        <a href="#" class="page active">1</a>
        <a href="#" class="page">2</a>
        <span class="dots">...</span>
        <a href="#" class="page">9</a>
        <a href="#" class="page">10</a>
        <a href="#" class="page">11</a>
        <a href="#" class="page">&gt;</a>
    </div>
</div>


</body>
@endsection