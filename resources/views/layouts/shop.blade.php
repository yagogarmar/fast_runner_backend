@extends('layouts.app')
@section('title', 'Login')
@section('content')
<body>
<div class="shop-container">
    <header class="shop-header">
        <nav class="shop-nav">
            <a href="#" class="nav-item">LEVELS</a>
            <a href="#" class="nav-item active">Tienda</a>
            <a href="#" class="nav-item">GLOBAL</a>
            <img src="/images/user-icon.png" class="user-icon">
        </nav>
    </header>

    <div class="shop-tabs">
        <button class="tab active">TODO</button>
        <button class="tab">SKINS</button>
        <button class="tab">MARCOS</button>
    </div>

    <div class="shop-items">
        @foreach ($items as $item)
            <div class="shop-item">
                <img src="{{ $item->image }}" class="item-image">
            </div>
        @endforeach
    </div>

    <div class="shop-detail">
        <div class="detail-card">
            <img src="/images/item-placeholder.png" class="detail-image">
            <div class="detail-info">
                <p>Descripción</p>
                <p class="price">Precio</p>
                <button class="buy-button">COMPRAR</button>
            </div>
        </div>
    </div>
</div>
</body>
@endsection