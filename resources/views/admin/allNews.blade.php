@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<p><a href="{{ route('admin::news::create::form') }}">Создать новость</a></p>
<p><a href="{{ route('admin::parse::all') }}">Добавить новости из источников</a></p>
<p><a href="{{ route('admin::source::add') }}">Добавить источник</a></p>
<p><a href="{{ route('admin::category::show::all') }}">Категории</a></p>
<p><a href="{{ route('admin::logout') }}">Выйти</a></p>
<table>
    <tr>
        <th>Картинка</th>
        <th>Заголовок</th>
        <th>Описание</th>
        <th>Категория</th>
        <th>Действие</th>
    </tr>
    @foreach ($news as $n)
    <tr>
        <td><img src="{{ asset('/storage/' . $n->img) ?? $n->img }}" alt="{{ $n->description }}" width="200"></td>
        <td>
            <a href="{{ route('admin::news::show', $n->id) }}">{{ $n->title }}</a>
        </td>
        <td>{{ $n->description }}</td>
        <td>{{ $n->category()->first()->name }}</td>
        <td>
            <a href="{{ route('admin::news::edit', $n->id) }}">Редактировать</a>
            <a href="{{ route('admin::news::delete', $n->id) }}">Удалить</a>
        </td>
    </tr>
    @endforeach
</table>    
{{ $news->links() }}

@endsection
