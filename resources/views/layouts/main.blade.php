<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title> Медузиум — @yield('title')</title>
</head>
<body>
<header>
        <div class="container">
            <div class="header-content">
                <nav class="nav">
                    <a href="/">Главная</a>
                    <a href="/exposition">Экспозиции</a>
                    <a href="/about">О нас</a>
                    <a href="/about#contact">Контакты</a>
                    <a href="/buy-ticket">Купить билет</a>
                </nav>
                <div class="burger"><span class="burger-item"></span></div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    

    <footer>
        <div class="footer">
            <div class="logo">
                <img src="{{ asset('img/logo.svg') }}" alt="" style="width: 55px; margin-right: 7px; opacity: 60%;">
                <p>Медузиум</p>
            </div>
            <div class="privacy">
                <p>2025 ©Все права защищены</p>
            </div>
        </div>
    </footer>

    <script>
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.nav');
        const show = 'show';
        const closeButtonStyle = 'close-burger';

        burger.addEventListener('click', function () {
            nav.classList.toggle(show);
            burger.classList.toggle(closeButtonStyle);
        });
    </script>
</body>
</html>
