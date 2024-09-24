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
        @foreach ($images as $image)
        <div class="imgContainer">
            <img class="post__img" src="{{ \Storage::url($image->img_url) }}" width="20%">
        </div>
        @endforeach
    </div>

    <div class="mypage">
        //
    </div>
</div>
@endsection