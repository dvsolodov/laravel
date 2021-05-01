@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<a href="{{ route('admin::category::show::all') }}">
    Назад в категории 
</a>

<form action="{{ route('admin::category::create') }}" method="POST">
    @if ($errors->any())
        <p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </p>
    @endif
    @if (session('createMsg'))
    <p>{{ session('createMsg') }}</p>
    @endif
    @csrf
    <p>
        <span>Название</span>
        <input type="text" name="name" value="{{ old('name') }}">
    </p>
    <p>
        <span>Slug</span>
        <input type="text" name="slug" value="{{ old('slug') }}">
    </p>
    <input type="submit" name="create" value="Создать">
</form>

@endsection

