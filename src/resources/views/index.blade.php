@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('main')
<div class="main">
    <div class="top__page-top">
        <a class="recommendation">おすすめ</a>
        <a class="top__mypage">マイページ</a>
    </div>

    <div class="recommendation">
        <div class="imgContainer">
            @foreach ($images as $image)
            <a href="/detail/{{ $image->id }}">
                <img class="post__img" src="{{ \Storage::url($image->img_url) }}" width="20%">
            </a>
            @endforeach
        </div>
    </div>

    <div class="mypage">
        //
    </div>
</div>
@endsection