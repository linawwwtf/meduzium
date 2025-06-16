<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Медузиум</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <header>
        <div class="container nav-container">
            <a href="/" class="logo">
                <img src="{{ asset('img/logo.svg') }}" alt="Медузиум">
                <span>Медузиум</span>
            </a>
            <nav>
                <a href="/">Главная</a>
                <a href="/exposition">Экспозиции</a>
                <a href="/about">О нас</a>
                <a href="/buy-ticket">Купить билет</a>
            </nav>
        </div>
    </header>

    <main class="all">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
</body>
</html>