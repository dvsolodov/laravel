@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

    <form action="{{ route('login') }}" method="POST">

        @if (session('loginMsg'))
        <p>{{ session('loginMsg') }}</p>
        @endif

        @csrf

        <p>
            <span>Почта:</span>
            <span><input type="email" name="email" value="{{ old('email') }}"></span>
        </p>
        <p>
            <span>Пароль:</span>
            <span><input type="password" name="password"></span>
        </p>
        <p>
            <span>Запомнить меня:</span>
            <span><input type="checkbox" name="remember_me" value="1"></span>
        </p>
        <input type="submit" name="login" value="Войти">

    </form>

@endsection

