<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление мероприятиями | Админ-панель</title>
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
            max-width: 1200px;
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
        
        /* ===== Карточка управления ===== */
        .admin-card {
            background: var(--glass-color);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* ===== Кнопки ===== */
        .btn {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            margin-bottom: 8px;
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
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
        }
        
        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
        }
        
        /* ===== Формы и фильтры ===== */
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            padding: 0.6rem 0.8rem;
            color: var(--white);
            font-size: 0.9rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-medium);
            box-shadow: 0 0 0 2px rgba(94, 131, 226, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }
        
        .form-inline {
            display: flex;
            align-items: center;
        }
        
        .mr-2 {
            margin-right: 0.5rem;
        }
        
        .mb-3 {
            margin-bottom: 1rem;
        }
        
        /* ===== Таблица ===== */
        .table-responsive {
            overflow-x: auto;
            border-radius: 8px;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(26, 35, 126, 0.3);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .table th, .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .table th {
            background-color: rgba(26, 35, 126, 0.5);
            font-weight: 600;
            color: var(--text-light);
        }
        
        /* ===== Пагинация ===== */
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 6px;
            margin-top: 1.5rem;
            justify-content: center;
        }
        
        .page-item.active .page-link {
            background-color: var(--primary-medium);
            border-color: var(--primary-medium);
        }
        
        .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: var(--text-light);
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .page-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
        }

        select.form-control {
            background-color: rgba(26, 35, 126, 0.8) !important;
            color: white !important;
            border: 1px solid #5e83e2 !important;
        }

        select.form-control option {
            color: white;
            background-color: #1a237e;
        }
        
        /* ===== Адаптивность ===== */
        @media (max-width: 768px) {
            .admin-title {
                font-size: 1.8rem;
            }
            
            .table th, .table td {
                padding: 0.75rem;
                font-size: 0.9rem;
            }
            
            .btn {
                padding: 0.5rem 1rem;
            }
        }
        
        @media (max-width: 576px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .form-inline {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .mr-2 {
                margin-right: 0;
                margin-bottom: 0.5rem;
            }
            
            .table th, .table td {
                padding: 0.5rem;
                font-size: 0.85rem;
            }
            
            .btn-group {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
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
            <h1 class="admin-title">Управление мероприятиями</h1>
        </header>
        
        <div class="admin-card">
            <div class="card-header">
                <div>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Назад
                    </a>
                </div>
            <div>
                    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Добавить мероприятие
                    </a>
                </div>
            </div>
            
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Тип</th>
                                <th>Дата</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->type_name }}</td>
                                <td>{{ $event->start_date->format('d.m.Y H:i') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Редактировать
                                        </a>
                                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить мероприятие?')">
                                                <i class="fas fa-trash"></i> Удалить
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="pagination-wrapper">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>