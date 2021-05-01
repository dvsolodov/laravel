@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

    <a href="{{ route('admin::news::show::all') }}">
        Назад в панель
    </a>

    <section>
        <h3>{{ $news->title }}</h3>
        <p>{{ $news->text }}</p>
    </section>

@endsection
