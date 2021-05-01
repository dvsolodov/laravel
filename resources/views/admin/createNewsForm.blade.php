@extends('layouts.admin')

@section('pageTitle', 'pageTitle')

@section('content')

<a dusk="backLink" href="{{ route('admin::news::show::all') }}">
    {{ __('newsCreateForm.back') }}
</a>

<form dusk="form" action="{{ route('admin::news::create') }}" method="POST">
    @if ($errors->any())
        <p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li dusk="error">{{ $error }}</li>
                @endforeach
            </ul>
        </p>
    @endif
    @if (session('createMsg'))
    <p dusk="createMsg">{{ session('createMsg') }}</p>
    @endif
    @csrf
    <p>
        <span>{{ __('newsCreateForm.title') }}</span>
        <input dusk="title" type="text" name="title" value="{{ old('title') }}">
    </p>
    <p>
        <span>{{ __('newsCreateForm.description') }}</span>
        <input dusk="description" type="text" name="description" value="{{ old('description') }}">
    </p>
    <p>
        <span>{{ __('newsCreateForm.text') }}</span>
        <textarea dusk="text" name="text" cols="30" rows="10">{{ old('text') }}</textarea>
    </p>
    <p>
        <span>{{ __('newsCreateForm.category') }}</span>
        <select dusk="category_id" name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>
    </p>
    <p>
        <span>{{ __('newsCreateForm.source') }}</span>
        <select dusk="source_id" name="source_id">
        @foreach ($sources as $source)
            <option value="{{ $source->id }}">{{ $source->url}}</option>
        @endforeach
        </select>
    </p>
    <input dusk="create" type="submit" name="create" value="{{ __('newsCreateForm.button') }}">
</form>

@endsection
