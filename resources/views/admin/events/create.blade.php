<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Медузиум — Добавление мероприятия</title>
</head>
<body>
<div class="all-register">
        <div class="container">
            <div class="underline">
                <h3 class="title">Добавить мероприятие</h3>
            </div>
            <div class="card">
    
    <div class="card-body">
        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label>Название</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Описание</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
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
            
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
</div>
</div>
</body>
</html>