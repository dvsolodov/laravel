@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<a href="{{ route('admin::news::show::all') }}">
    Назад в панель
</a>

<form action="{{ route('admin::news::edit', $news->id) }}" method="POST" enctype="multipart/form-data">
    @if ($errors->any())
        <div class="alert alert-danger">
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
    <p>
        <span>Картинка</span>
        <span><input type="file" name="img"></span>
    </p>
    <input type="submit" name="edit" value="Сохранить">
</form>

@endsection
