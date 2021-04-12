@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

    @foreach ($news['news'] as $item)
        <section>
            <h3>{{ $item['title'] }}</h3>
            <p>{{ $item['desc'] }}</p>
            <a href="{{ route('news::card', [$item['category'], $item['slug']]) }}">
                Читать
            </a>
        </section>
    @endforeach

@endsection

