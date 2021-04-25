@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

    <a href="{{ route('news::fromCategory', $fullNews->catSlug) }}">
        Назад в категорию "{{ $fullNews->category }}"
    </a>

    <section>
        <h3>{{ $fullNews->title }}</h3>
        <p>{{ $fullNews->text }}</p>
    </section>

@endsection
