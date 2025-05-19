<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование мероприятия</title>
</head>
<body>
<div class="all-register">
        <div class="container">
            <div class="underline">
                <h3 class="title">Редактировать мероприятие</h3>
            </div>
            <div class="card">
    
    <div class="card-body">
        <form method="POST" action="{{ route('admin.events.update', $event) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Название</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
            </div>
            
            <div class="form-group">
                <label>Описание</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $event->description) }}</textarea>
            </div>
            
            <div class="form-group">
                <label>Тип мероприятия</label>
                <select name="type" class="form-control" required>
                    <option value="exhibition" {{ $event->type == 'exhibition' ? 'selected' : '' }}>Выставка</option>
                    <option value="masterclass" {{ $event->type == 'masterclass' ? 'selected' : '' }}>Мастер-класс</option>
                    <option value="lecture" {{ $event->type == 'lecture' ? 'selected' : '' }}>Лекция</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Дата и время начала</label>
                <input type="datetime-local" name="start_date" class="form-control" 
                       value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}" required>
            </div>
            
            <div class="form-group">
                <label>Дата и время окончания (необязательно)</label>
                <input type="datetime-local" name="end_date" class="form-control" 
                       value="{{ old('end_date', $event->end_date ? $event->end_date->format('Y-m-d\TH:i') : '') }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
</div>
</div>
</body>
</html>