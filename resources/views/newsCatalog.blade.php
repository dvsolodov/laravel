@extends('layouts.main')

@section('pageTitle', 'pageTitle')

@section('content')

<ul>
    @foreach ($newsCategory as $category => $path)
    <li>
        <a href="{{ route('news::fromCategory', $path) }}">
            {{ $category }}
        </a>
    </li>
    @endforeach
</ul>

@endsection

