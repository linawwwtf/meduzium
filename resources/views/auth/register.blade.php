<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>
    <div class="all-register">
        <div class="container">
            <div class="underline">
                <h3 class="title">Регистрация нового администратора</h3>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

            <div class="register">
                <div class="register-container">
                    <form action="{{ route('register') }}" method="POST" class="register-form">
                        @csrf
                            <div class="register-input">
                                <input type="text" id="name" name="name" class="form-input" placeholder="Ваше имя" value="{{ old('name') }}" required>
                            </div>

                            <div class="register-input">
                                    <input type="email" id="email" name="email" class="form-input" placeholder="Адрес эл. почты" value="{{ old('email') }}" required>
                            </div>

                            <div class="register-input">
                                    <input type="password" id="password" name="password" class="form-input" placeholder="Пароль" required>
                            </div>

                            <div class="register-input">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Повторите пароль" required>
                            </div>
                            
                            <div class="btn">
                                <button type="submit" class="custom-button">Регистрация</button>
                            </div>
                    </form>
                </div>
                
            </div>
            <a href="/login" class="register-link">Уже есть аккаунт? Войдите</a>
        </div>
    </div>

    <footer>
        <div class="footer-auth">
            <div class="logo">
                <img src="{{ asset('img/logo.svg') }}" alt="" style="width: 55px; margin-right: 7px; opacity: 60%;">
                <p>Медузиум</p>
            </div>
            <div class="privacy">
                <p>2025 ©Все права защищены</p>
            </div>
        </div>
    </footer>
</body>
</html>