<!DOCTYPE html>
<html lang="ru">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Медузиум — @yield('title')</title>

    <style>
        /* Стили для блока режима работы в шапке */
        .header-working-hours {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            padding: 8px 15px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 20px;
            font-size: 14px;
            position: relative;
            width: 50%;
            margin-bottom: 2%;
        }
        
        .header-working-hours::before {
            content: "";
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #4CAF50;
            margin-right: 8px;
            animation: pulse 2s infinite;
        }
        
        .header-working-hours__tooltip {
            position: absolute;
            top: 100%;
            right: 0;
            background: #fff;
            color: #333;
            padding: 10px;
            border-radius: 5px;
            width: 180px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 100;
            font-size: 13px;
            line-height: 1.4;
        }
        
        .header-working-hours:hover .header-working-hours__tooltip {
            opacity: 1;
            visibility: visible;
        }
        
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
        
        @media (max-width: 992px) {
            .header-working-hours {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="header-working-hours">
                    
                    <div class="header-working-hours__tooltip">
                        <strong>Режим работы:</strong><br>
                        Пн-Пт: 10:00 - 20:00<br>
                        Сб-Вс: 09:00 - 22:00<br>
                        Последний вторник месяца - санитарный день
                    </div>
                </div>

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
                <p class="footer-name">Медузиум</p>
            </div>
            <div class="privacy">
                <p>2025 ©Все права защищены</p>
            </div>
        </div>
    </footer>

    <script>
        // Фиксированный header при прокрутке
        const header = document.querySelector('header');
        const headerContent = document.querySelector('.header-content');
        const scrollThreshold = 100; // Пикселей прокрутки до активации эффекта

        window.addEventListener('scroll', function() {
            if (window.scrollY > scrollThreshold) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            
            // Устанавливаем порядок появления
            fadeElements.forEach((el, index) => {
                el.style.setProperty('--order', index);
            });
            
            const checkVisibility = () => {
                const windowHeight = window.innerHeight;
                const triggerOffset = windowHeight * 0.8; // Срабатывает при 80% высоты экрана
                
                fadeElements.forEach(el => {
                    if (el.classList.contains('visible')) return;
                    
                    const rect = el.getBoundingClientRect();
                    const elemTop = rect.top;
                    const elemBottom = rect.bottom;
                    
                    if (elemTop < triggerOffset && elemBottom > 0) {
                        el.classList.add('visible');
                    }
                });
            };
            
            checkVisibility();
            window.addEventListener('scroll', checkVisibility);
            window.addEventListener('resize', checkVisibility);
        });

        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.nav');
        const show = 'show';
        const closeButtonStyle = 'close-burger';

        burger.addEventListener('click', function () {
            nav.classList.toggle(show);
            burger.classList.toggle(closeButtonStyle);
        });

    document.addEventListener('DOMContentLoaded', function() {
    const hoursElement = document.querySelector('.header-working-hours');
    if (!hoursElement) return;
    
    const now = new Date();
    const hours = now.getHours();
    const day = now.getDay();
    const isSanitaryDay = (new Date().getDate() >= 25 && day === 2); // Последний вторник месяца
    
    let isOpen = false;
    
    // Проверяем режим работы
    if (isSanitaryDay) {
        isOpen = false;
    } else if (day >= 1 && day <= 5) { // Пн-Пт
        isOpen = hours >= 10 && hours < 20;
    } else { // Сб-Вс
        isOpen = hours >= 9 && hours < 22;
    }
    
    // Обновляем статус
    if (isOpen) {
        hoursElement.innerHTML = 'Сейчас открыто' + hoursElement.innerHTML;
        hoursElement.style.setProperty('--status-color', '#4CAF50');
    } else {
        hoursElement.innerHTML = 'Сейчас закрыто' + hoursElement.innerHTML;
        hoursElement.style.setProperty('--status-color', '#F44336');
    }
});

</script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    @yield('scripts')
</body>
</html>