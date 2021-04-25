@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

@if (!isset($news['news'][0]))
    <p>В данной категории новостей нет</p>
@else

    @foreach ($news['news'] as $item)
        <section>
            <h3>{{ $item->title }}</h3>
            <p>{{ $item->text }}</p>
            <a href="{{ route('news::card', [$item->category()->first()->slug, $item->slug]) }}">
                Читать
            </a>
        </section>
    @endforeach

@endif
@endsection

