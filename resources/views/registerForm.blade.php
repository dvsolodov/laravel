@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

    <form action="{{ route('register') }}" method="POST">

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('registerMsg'))
        <p>{{ session('registerMsg') }}</p>
        @endif

        @csrf

        <p>
            <span>Имя:</span>
            <span><input type="text" name="name" value="{{ old('name') }}"></span>
        </p>
        <p>
            <span>Почта:</span>
            <span><input type="email" name="email" value="{{ old('email') }}"></span>
        </p>
        <p>
            <span>Пароль:</span>
            <span><input type="password" name="password"></span>
        </p>
        <p>
            <span>Подтверждение пароля:</span>
            <span><input type="password" name="password_confirmation"></span>
        </p>
        <p>
            <span>Запомнить меня:</span>
            <span><input type="checkbox" name="remember_me" value="1"></span>
        </p>
        <input type="submit" name="register" value="Зарегистрироваться">

    </form>

@endsection

