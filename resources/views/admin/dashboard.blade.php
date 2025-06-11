<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель | Медузариум</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* ===== Основные стили ===== */
        :root {
            --primary-dark: #1a237e;
            --primary-medium: #5e83e2;
            --primary-light: #9747FF;
            --glass-color: rgba(26, 35, 126, 0.2);
            --white: #ffffff;
            --text-light: rgba(255, 255, 255, 0.9);
        }
        
        body {
            font-family: 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: 
                linear-gradient(rgba(26, 35, 126, 0.7), rgba(26, 35, 126, 0.9)),
                url('/img/bg-exposition.jpg') center/cover no-repeat fixed;
            color: var(--white);
        }
        
        /* ===== Контейнер и структура ===== */
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .admin-header {
            text-align: center;
            margin-bottom: 3rem;
            padding-bottom: 27px;
            background-color: var(--glass-color);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .admin-title {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .admin-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-light), var(--primary-medium));
            border-radius: 2px;
        }
        
        /* ===== Сетка карточек ===== */
        .admin-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 0 auto;
        }
        
        /* ===== Стиль карточек (стеклянный морфизм) ===== */
        .admin-card {
            background: var(--glass-color);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            background: rgba(26, 35, 126, 0.3);
        }
        
        .card-content {
            padding: 2rem;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        /* Цветовые вариации карточек */
        .card-primary {
            background: rgba(94, 131, 226, 0.2);
            border: 1px solid rgba(94, 131, 226, 0.3);
        }
        
        .card-primary:hover {
            background: rgba(94, 131, 226, 0.3);
        }
        
        .card-success {
            background: rgba(76, 175, 80, 0.2);
            border: 1px solid rgba(76, 175, 80, 0.3);
        }
        
        .card-success:hover {
            background: rgba(76, 175, 80, 0.3);
        }
        
        .card-info {
            background: rgba(0, 188, 212, 0.2);
            border: 1px solid rgba(0, 188, 212, 0.3);
        }
        
        .card-info:hover {
            background: rgba(0, 188, 212, 0.3);
        }
        
        .card-warning {
            background: rgba(255, 193, 7, 0.2);
            border: 1px solid rgba(255, 193, 7, 0.3);
        }
        
        .card-warning:hover {
            background: rgba(255, 193, 7, 0.3);
        }
        
        /* Иконки */
        .card-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            color: var(--text-light);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: var(--white);
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }
        
        /* Кнопки */
        .card-button {
            display: inline-block;
            padding: 0.6rem 1.8rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50px;
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            margin-top: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: none;
            cursor: pointer;
        }
        
        .card-button:hover {
            background: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        /* ===== Адаптивность ===== */
        @media (max-width: 992px) {
            .admin-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .admin-title {
                font-size: 2rem;
            }
            
            .card-content {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .admin-grid {
                grid-template-columns: 1fr;
            }
            
            .admin-title {
                font-size: 1.8rem;
            }
            
            body {
                background-attachment: scroll;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1 class="admin-title">Панель управления</h1>
        </header>
        
        <main class="admin-main">
            <div class="admin-grid">
                <!-- Карточка мероприятий -->
                <div class="admin-card card-primary">
                    <div class="card-content">
                        <i class="fas fa-calendar-alt card-icon"></i>
                        <h3 class="card-title">Мероприятия</h3>
                        <a href="{{ route('admin.events.index') }}" class="card-button">Управление</a>
                    </div>
                </div>
                
                <!-- Карточка пользователей -->
                <div class="admin-card card-success">
                    <div class="card-content">
                        <i class="fas fa-users card-icon"></i>
                        <h3 class="card-title">Пользователи</h3>
                        <a href="/" class="card-button">Управление</a>
                    </div>
                </div>
                
                <!-- Карточка отзывов -->
                <div class="admin-card card-info">
                    <div class="card-content">
                        <i class="fas fa-comments card-icon"></i>
                        <h3 class="card-title">Отзывы</h3>
                        <a href="{{ route('admin.reviews.index') }}" class="card-button">Управление</a>
                    </div>
                </div>
                
                <!-- Карточка фотографий -->
                <div class="admin-card card-primary">
                    <div class="card-content">
                        <i class="fas fa-camera card-icon"></i>
                        <h3 class="card-title">Предложенные фотографии</h3>
                        <a href="{{ route('admin.gallery') }}" class="card-button">Управление</a>
                    </div>
                </div>
                
                <!-- Карточка обратной связи -->
                <div class="admin-card card-success">
                    <div class="card-content">
                        <i class="fas fa-envelope card-icon"></i>
                        <h3 class="card-title">Обратная связь</h3>
                        <a href="{{ route('admin.contacts.index') }}" class="card-button">Управление</a>
                    </div>
                </div>
                
                <!-- Карточка стоимости билетов -->
                <div class="admin-card card-warning">
                    <div class="card-content">
                        <i class="fas fa-ticket-alt card-icon"></i>
                        <h3 class="card-title">Стоимость билетов</h3>
                        <a href="{{ route('admin.ticket-prices.edit') }}" class="card-button">Изменить</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>