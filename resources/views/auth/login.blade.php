@extends('layouts.other')

@section('title', 'Вход')

@section('content')
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
                                    <input type="email" id="email" name="email" class="form-input" placeholder="Адрес эл. почты" value="{{ old('email') }}">
                            </div>

                            <div class="register-input">
                                    <input type="password" id="password" name="password" class="form-input" placeholder="Пароль">
                            </div>

                            <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Запомнить меня</label>
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
@endsection