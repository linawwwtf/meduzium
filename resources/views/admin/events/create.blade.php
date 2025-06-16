<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Медузиум — Добавление мероприятия</title>
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
            --danger: #f44336;
            --success: #4CAF50;
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
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .admin-header {
            text-align: center;
            margin-bottom: 2rem;
            padding: 1rem;
            background-color: var(--glass-color);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .admin-title {
            font-size: 2.2rem;
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
        
        /* ===== Карточка формы ===== */
        .admin-card {
            background: var(--glass-color);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 30px;
            padding-right: 60px;
        }
        
        /* ===== Форма ===== */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-light);
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 6px;
            color: var(--white);
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-medium);
            box-shadow: 0 0 0 2px rgba(94, 131, 226, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        /* Стили для select */
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ffffff'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 2.5rem;
            width: 30%;
        }
        
        /* Стили для опций (чтобы были читаемы) */
        select.form-control option {
            background-color: #1a237e;
            color: var(--white);
            padding: 10px;
        }
        
        /* Стили для datetime-local */
        input[type="datetime-local"].form-control {
            padding: 0.7rem 1rem;
        }
        
        /* ===== Кнопка ===== */
        .btn {
            display: inline-block;
            padding: 0.8rem 1.8rem;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        
        .btn-primary {
            background-color: var(--primary-medium);
            color: white;
            box-shadow: 0 2px 8px rgba(26, 35, 126, 0.3);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 35, 126, 0.4);
        }
        
        /* ===== Адаптивность ===== */
        @media (max-width: 768px) {
            .admin-container {
                padding: 1.5rem;
            }
            
            .admin-title {
                font-size: 1.8rem;
            }
            
            .admin-card {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .admin-title {
                font-size: 1.6rem;
            }
            
            .form-control {
                padding: 0.7rem 0.9rem;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1 class="admin-title">Добавить мероприятие</h1>
        </header>
        
        <div class="admin-card">
            <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label>Описание</label>
                    <textarea name="description" class="form-control" rows="5" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Тип мероприятия</label>
                    <select name="type" class="form-control" required>
                        <option value="exhibition">Выставка</option>
                        <option value="masterclass">Мастер-класс</option>
                        <option value="lecture">Лекция</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Дата и время начала</label>
                    <input type="datetime-local" name="start_date" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label>Дата и время окончания (необязательно)</label>
                    <input type="datetime-local" name="end_date" class="form-control">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Сохранить мероприятие
                    </button>
                </div>

                <div>
                    <a href="/admin/events" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Назад
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>