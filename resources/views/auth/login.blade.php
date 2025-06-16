<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в систему | Админ-панель</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #1a237e;
            --primary-medium: #5e83e2;
            --primary-light: #9747FF;
            --secondary-color: #6c757d;
            --error-color: #ff6b6b;
            --bg-dark: #0a1a2a;
            --bg-light: #1a3a5a;
            --text-light: rgba(255, 255, 255, 0.9);
            --border-color: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, var(--bg-dark) 0%, var(--bg-light) 100%);
            color: var(--text-light);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .allregister {
            padding: 60px 0;
        }

        .underline {
            position: relative;
            margin-bottom: 40px;
            text-align: center;
        }

        .title {
            font-family: 'Comfortaa', cursive;
            font-size: 2rem;
            color: white;
            margin: 0;
            position: relative;
            display: inline-block;
        }

        .title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-light), var(--primary-medium));
            border-radius: 2px;
        }

        .alert-danger {
            background: rgba(255, 107, 107, 0.2);
            border-left: 4px solid var(--error-color);
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            color: var(--error-color);
        }

        .alert-danger p {
            margin: 5px 0;
        }

        .register {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 30px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .register-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .register-input {
            position: relative;
        }

        .form-input {
            width: 90%;
            padding: 14px 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: var(--text-light);
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-medium);
            box-shadow: 0 0 0 2px rgba(94, 131, 226, 0.3);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-medium);
        }

        .remember-me label {
            cursor: pointer;
            user-select: none;
        }

        .btn-auth {
            margin-top: 20px;
        }

        .custom-button {
            background: var(--primary-medium);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            font-family: 'Montserrat', sans-serif;
        }

        .custom-button:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: var(--primary-medium);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .register-link:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
            
            .allregister {
                padding: 40px 0;
            }
            
            .title {
                font-size: 1.8rem;
            }
            
            .register {
                padding: 25px;
            }
        }

        @media (max-width: 480px) {
            .title {
                font-size: 1.6rem;
            }
            
            .form-input {
                padding: 12px 15px;
            }
            
            .custom-button {
                padding: 12px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="allregister">
        <div class="container">
            <div class="underline">
                <h3 class="title">Вход в систему</h3>
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
                    <form action="{{route('login')}}" method="POST" class="register-form">
                        @csrf
                        <div class="register-input">
                            <input type="email" id="email" name="email" class="form-input" placeholder="Адрес эл. почты" value="{{ old('email') }}" required>
                        </div>

                        <div class="register-input">
                            <input type="password" id="password" name="password" class="form-input" placeholder="Пароль" required>
                        </div>
                        
                        <div class="btn-auth">
                            <div class="btn">
                                <button type="submit" class="custom-button">Войти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="register-link">
                    Забыли пароль?
                </a>
            @endif
        </div>
    </div>
</body>
</html>