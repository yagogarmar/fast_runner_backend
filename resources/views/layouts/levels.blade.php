@extends('layouts.app')
@section('title', 'Login')
@section('content')
<body>
<div class="levels-container">
    <div class="level-grid">
        @for ($i = 1; $i <= 8; $i++)
            <a href="{{ url('/levels/lvl' . $i) }}" class="level-box">
                LVL{{ sprintf('%02d', $i) }}
            </a>
        @endfor
    </div>
</div>

<footer class="footer">
    FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER FAST RUNNER
</footer>


</body>
@endsection