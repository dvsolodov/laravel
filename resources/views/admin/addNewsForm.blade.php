@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<a dusk="backLink" href="{{ route('admin::news::show::all') }}">
    Назад к новостям
</a>

<form action="{{ route('admin::news::add') }}" method="POST">
    @if (session('rssMsg'))
    <p>{{ session('rssMsg') }}</p>
    @endif

    @csrf

    <p>
        <span>Адрес rss-источника</span>
        <span><input type="text" name="rssSource" value="{{ old('rssSource') }}"></span>
    </p>
    <input type="submit" name="rss" value="Получить">

</form>
@endsection

