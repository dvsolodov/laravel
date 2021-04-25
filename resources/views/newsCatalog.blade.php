@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

<ul>
    @foreach ($newsCategory as $category => $item)
    <li>
        <a href="{{ route('news::fromCategory', $item->slug) }}">
            {{ $item->name }}
        </a>
    </li>
    @endforeach
</ul>

@endsection

