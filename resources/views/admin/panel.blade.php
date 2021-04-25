@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<table>
    <tr>
        <th>Заголовок</th>
        <th>Описание</th>
        <th>Категория</th>
        <th>Действие</th>
    </tr>
    @foreach ($news as $n)
    <tr>
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

@endsection
