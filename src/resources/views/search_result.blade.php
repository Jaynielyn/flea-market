@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/search_result.css') }}">
@endsection
<x-header></x-header>

@section('main')
<div class="search-results">
    @if ($items->isEmpty())
    <p>該当する商品が見つかりませんでした。</p>
    @else
    <div class="img__container">
        @foreach ($items as $item)
        <a href="/detail/{{ $item->id }}" class="image__link">
            <img class="post__img" src="{{ asset('storage/' . $item->img_url) }}" alt="{{ $item->name }}">
        </a>
        @endforeach
    </div>
    @endif
</div>
@endsection