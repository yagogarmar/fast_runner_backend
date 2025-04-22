@extends('layouts.app')
@section('title', 'Login')
@section('content')
<body>
<div class="content">
    <h1>LVL 01</h1>
    <div class="record-section">
        <div class="record-card">
            <img src="{{ asset('images/profile-placeholder.png') }}" alt="Player Avatar">
            <p class="player-name">Lorem ipsum</p>
            <p class="record-time">03:34:02</p>
            <p class="record-date">19/03/2025</p>
        </div>
    </div>
    <div class="leaderboard">
        <table>
            <thead>
                <tr>
                    <th>TOP</th>
                    <th>PLAYER</th>
                    <th>TIME</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Lorem ipsum</td>
                    <td>03:34:02</td>
                    <td>19/03/2025</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lorem ipsum</td>
                    <td>03:34:02</td>
                    <td>19/03/2025</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Lorem ipsum</td>
                    <td>03:34:02</td>
                    <td>19/03/2025</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <button>&lt;</button>
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <button>&gt;</button>
    </div>

    <div class="comments-section">
        <h2>Añade un comentario...</h2>
        <textarea placeholder="Escribe tu comentario..."></textarea>
        <button class="cancel">CANCELAR</button>
        <button class="comment">COMENTAR</button>

        <div class="comment-box">
            <img src="{{ asset('images/profile-placeholder.png') }}" alt="User Avatar">
            <p class="comment-author">Lorem ipsum <span>Hace 5 horas</span></p>
            <p class="comment-text">Lorem ipsum dolor sit amet...</p>
            <button class="reply">Responder</button>
        </div>
    </div>
</div>

<footer class="footer">
    FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER
</footer>



</body>
@endsection