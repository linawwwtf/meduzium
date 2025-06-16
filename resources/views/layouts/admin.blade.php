<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Админ-панель Медузиум</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Comfortaa:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <!-- Боковая панель -->
        <aside class="admin-sidebar">
            <div class="admin-logo">
                <img src="{{ asset('img/logo.svg') }}" alt="Медузиум">
                <span>Админ-панель</span>
            </div>
            
            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Главная
                </a>
                <a href="{{ route('admin.events.index') }}" class="{{ request()->routeIs('admin.events') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Мероприятия
                </a>
                <a href="{{ route('admin.reviews.index') }}" class="{{ request()->routeIs('admin.reviews') ? 'active' : '' }}">
                    <i class="fas fa-comment-alt"></i> Отзывы
                </a>
                <a href="{{ route('admin.gallery') }}" class="{{ request()->routeIs('admin.gallery') ? 'active' : '' }}">
                    <i class="fas fa-images"></i> Фотографии
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i> Обратная связь
                </a>
                <a href="{{ route('admin.ticket-prices.edit') }}" class="{{ request()->routeIs('admin.tickets') ? 'active' : '' }}">
                    <i class="fas fa-ticket-alt"></i> Билеты
                </a>
            </nav>
            
            <div class="admin-logout">
                <form action="{{ route('logout') }}" method="GET">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt"></i> Выйти
                    </button>
                </form>
            </div>
        </aside>

        <!-- Основное содержимое -->
        <main class="admin-content">
            <header class="admin-header">
                <h1>@yield('header')</h1>
                <div class="admin-user">
                    <span>{{ Auth::user()->name }}</span>
                    <i class="fas fa-user-circle"></i>
                </div>
            </header>
            
            <div class="admin-main">
                @yield('content')
            </div>
        </main>
    </div>
    
    @yield('scripts')
</body>
</html>