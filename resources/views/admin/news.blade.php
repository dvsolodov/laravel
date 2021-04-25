@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

    <a href="{{ route('admin::news::index') }}">
        Назад в панель
    </a>

    <section>
        <h3>{{ $news->title }}</h3>
        <p>{{ $news->text }}</p>
    </section>

@endsection
