@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

    <a href="{{ route('news::fromCategory', $fullNews->category()->first()->slug) }}">
        Назад в категорию "{{ $fullNews->category()->first()->name }}"
    </a>

    <section>
        <h3>{{ $fullNews->title }}</h3>
        <p>{{ $fullNews->text }}</p>
    </section>

@endsection
