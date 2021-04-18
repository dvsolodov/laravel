@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')
    <form action="{{ route('feedback::create') }}" method="POST">
        @if (session('feedbackMsg'))
        <p>{{ session('feedbackMsg') }}</p>
        @endif
        @csrf
        <p>
            <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}">
        </p>
        <p>
            <input type="text" name="email" placeholder="Электронная почта" value="{{ old('email') }}">
        </p>
        <p>
            <textarea name="message" cols="30" rows="10" placeholder="Текст сообщения">{{ old('message') }}</textarea>
        </p>
        <input type="submit" name="feedback" value="Отправить">
        <input type="reset" value="Очистить">
    </form>
@endsection
