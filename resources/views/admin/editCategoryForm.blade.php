@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<a href="{{ route('admin::category::show::all') }}">
    Назад в категории 
</a>

<form action="{{ route('admin::category::edit', $category->id) }}" method="POST">
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
        <span>Название</span>
        <input type="text" name="name" value="{{ $category->name }}">
    </p>
    <p>
        <span>Slug</span>
        <input type="text" name="slug" value="{{ $category->slug }}">
    </p>
    <input type="submit" name="edit" value="Сохранить">
</form>

@endsection

