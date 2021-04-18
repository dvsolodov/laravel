@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

    <a href="{{ route('news::fromCategory', $fullNews['link']) }}">
        Назад в категорию "{{ $fullNews['cat'] }}"
    </a>

    <section>
        <h3>{{ $fullNews['title'] }}</h3>
        <p>{{ $fullNews['text'] }}</p>
    </section>

@endsection
