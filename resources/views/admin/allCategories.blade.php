@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<p><a href="{{ route('admin::news::show::all') }}">Новости</a></p>
<p><a href="{{ route('admin::category::create::form') }}">Создать категорию</a></p>
<p><a href="{{ route('admin::logout') }}">Выйти</a></p>

<table>
    <tr>
        <th>Имя</th>
        <th>Slug</th>
        <th>Действие</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->name}}</a></td>
        <td>{{ $category->slug }}</td>
        <td>
            <a href="{{ route('admin::category::edit::form', $category->id) }}">Редактировать</a>
            <a href="{{ route('admin::category::delete', $category->id) }}">Удалить</a>
        </td>
    </tr>
    @endforeach
</table>    

@endsection

