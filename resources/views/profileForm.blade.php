@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

    <form action="{{ route('profile::edit') }}" method="POST">

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('editMsg'))
        <p>{{ session('editMsg') }}</p>
        @endif

        @csrf

        <p>
            <span>Имя:</span>
            <span><input type="text" name="name" value="{{ old('name') ?? $user->name }}"></span>
        </p>
        <p>
            <span>Почта:</span>
            <span><input type="email" name="email" value="{{ old('email') ?? $user->email }}" readOnly></span>
        </p>
        <p>
            <span>Пароль:</span>
            <span><input type="password" name="password"></span>
        </p>
        <p>
            <span>Подтверждение пароля:</span>
            <span><input type="password" name="password_confirmation"></span>
        </p>
        <input type="submit" name="edit" value="Сохранить">

    </form>

@endsection


