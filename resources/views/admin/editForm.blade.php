@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<a href="{{ route('admin::news::index') }}">
    Назад в панель
</a>

<form action="{{ route('admin::news::edit', $news->id) }}" method="POST">
    @if (session('editMsg'))
    <p>{{ session('editMsg') }}</p>
    @endif
    @csrf
    <p>
        <span>Заголовок</span>
        <input type="text" name="title" value="{{ $news->title }}">
    </p>
    <p>
        <span>Описание</span>
        <input type="text" name="description" value="{{ $news->description }}">
    </p>
    <p>
        <span>Текст</span>
        <textarea name="text" cols="30" rows="10">{{ $news->text }}</textarea>
    </p>
    <input type="hidden" name="category_id" value="{{ $news->category_id }}">
    <input type="hidden" name="source_id" value="{{ $news->source_id }}">
    <input type="hidden" name="publish_date" value="{{ $news->publish_date }}">
    <input type="submit" name="edit" value="Сохранить">
</form>

@endsection
