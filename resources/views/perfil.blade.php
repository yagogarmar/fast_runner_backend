@extends('layouts.app')
@section('title', 'Login')
@section('content')
<body>
<nav class="navbar">
    <div class="container">
        <a href="#" class="logo">MiWeb</a>
        <ul class="nav-links">
            <li><a href="views/home.blade.php">Home</a></li>
            <li><a href="{{ url('/global') }}">Global</a></li>
            <li><a href="layouts/levels.blade.php">Levels</a></li>
            <li><a href="{{ url('/download') }}">Download</a></li>
            <li><a href="{{ url('/store') }}">Store</a></li>
        </ul>
    </div>
</nav>
</nav>
    <h1>PERFIL</h1>
    <button onclick="logout()">Logout</button>
    <div class="profile-container">
    <header class="profile-header">
        <h1 class="profile-title">Fast Runner</h1>
    </header>

    <div class="profile-card">
        <div class="profile-picture">
            <img src="/images/user-placeholder.png" alt="User Image">
            <span class="badge">TOP 3 !!!</span>
        </div>
        <div class="profile-info">
            <h2 class="username">Lorem Ipsum</h2>
            <p><strong>NAME</strong><br>John Doe</p>
            <p><strong>EMAIL</strong><br>loremipsum@gmail.com</p>
            <button class="edit-button">✎</button>
        </div>
    </div>

    <div class="stats-container">
        <h2>MIS ESTADISTICAS</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <p class="stat-label">PUNTOS</p>
                <p class="stat-value">6.517</p>
            </div>
            <div class="stat-item">
                <p class="stat-label">PARTIDAS JUGADAS</p>
                <p class="stat-value">68</p>
            </div>
            <div class="stat-item">
                <p class="stat-label">VICTORIAS</p>
                <p class="stat-value">5</p>
            </div>
            <div class="stat-item">
                <p class="stat-label">RATIO DE VICTORIAS</p>
                <p class="stat-value">14%</p>
            </div>
        </div>
    </div>
</div>
</body>
@endsection