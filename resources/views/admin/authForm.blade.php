@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

    <form action="{{ route('admin::auth') }}" method="POST">

        @if (isset($authMsg))
        <p>{{ $authMsg }}</p>
        @endif

        <p>
            <span>Логин:</span>
            <span><input type="text" name="login"></span>
        </p>
        <p>
            <span>Пароль:</span>
            <span><input type="password" name="password"></span>
        </p>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" name="adminAuth" value="Войти">
    </form>

@endsection
