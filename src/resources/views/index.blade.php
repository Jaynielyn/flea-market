@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
<x-header></x-header>

@section('main')
<div class="index__page">
    <div class="top__page">
        <a class="recommendation" href="#">おすすめ</a>
        <a class="top__mypage" href="#">マイリスト</a>
    </div>

    <div class="recommendation">
        <div class="img__container">
            @foreach ($images as $image)
            <a href="/detail/{{ $image->id }}" class="image__link">
                <img class="post__img" src="{{ \Storage::url($image->img_url) }}">
            </a>
            @endforeach
        </div>
    </div>
</div>

@endsection