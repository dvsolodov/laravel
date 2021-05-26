@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<a dusk="backLink" href="{{ route('admin::news::show::all') }}">
    Назад к новостям
</a>

<form action="{{ route('admin::source::add') }}" method="POST">
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('sourceMsg'))
    <p>{{ session('sourceMsg') }}</p>
    @endif

    @csrf

    <p>
        <span>Адрес rss-источника</span>
        <span><input type="text" name="url" value="{{ old('source') }}"></span>
    </p>
    <p>
        <span>Категория</span>
        <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>
    </p>
    <input type="submit" name="sourceForm" value="Добавить">

</form>
@endsection

