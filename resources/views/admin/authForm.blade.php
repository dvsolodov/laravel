@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

    <form action="{{ route('admin::auth') }}" method="POST">

        @if (session('authMsg'))
        <p>{{ session('authMsg') }}</p>
        @endif

        @csrf

        <p>
            <span>Почта:</span>
            <span><input type="email" name="email">{{ old('email') }}</span>
        </p>
        <p>
            <span>Пароль:</span>
            <span><input type="password" name="password"></span>
        </p>
        <input type="submit" name="adminAuth" value="Войти">

    </form>

@endsection
