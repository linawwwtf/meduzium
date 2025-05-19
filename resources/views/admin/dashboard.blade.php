<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
</head>
<body>
<div class="all-register">
        <div class="container">
            <div class="underline">
                <h3 class="title">Панель управления</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-calendar-alt fa-3x mb-3"></i>
                                <h5>Мероприятия</h5>
                                <a href="{{ route('admin.events.index') }}" class="btn btn-light btn-sm mt-2">Управление</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card bg-success text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-users fa-3x mb-3"></i>
                                <h5>Пользователи</h5>
                                <a href="/" class="btn btn-light btn-sm mt-2">Управление</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-comments fa-3x mb-3"></i>
                                <h5>Отзывы</h5>
                                <a href="{{ route('admin.reviews.index') }}" class="btn btn-light btn-sm mt-2">Управление</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-comments fa-3x mb-3"></i>
                                <h5>Предложенные фотографии</h5>
                                <a href="{{ route('admin.suggestions.index') }}" class="btn btn-light btn-sm mt-2">Управление</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <i class="fas fa-comments fa-3x mb-3"></i>
                                <h5>Обратная связь</h5>
                                <a href="{{ route('admin.contacts.index') }}" class="btn btn-light btn-sm mt-2">Управление</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
