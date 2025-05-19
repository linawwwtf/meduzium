<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление мероприятиями</title>
</head>
<body>
<div class="all-register">
        <div class="container">
            <div class="underline">
                <h3 class="title">Мероприятия</h3>
            </div>

            <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                Добавить мероприятие
            </a>
        </div>
    </div>
    
    <div class="card-body">
        <div class="mb-3">
            <form method="GET" class="form-inline">
                <select name="type" class="form-control mr-2" onchange="this.form.submit()">
                    <option value="">Все типы</option>
                    <option value="exhibition" {{ request('type') == 'exhibition' ? 'selected' : '' }}>Выставки</option>
                    <option value="masterclass" {{ request('type') == 'masterclass' ? 'selected' : '' }}>Мастер-классы</option>
                    <option value="lecture" {{ request('type') == 'lecture' ? 'selected' : '' }}>Лекции</option>
                </select>
            </form>
        </div>
        
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
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-primary">
                                Редактировать
                            </a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить мероприятие?')">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{ $events->links() }}
    </div>
</div>
</div>
</body>
</html>