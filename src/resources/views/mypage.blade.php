@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection
<x-header></x-header>

@section('main')
<div class="mypage__page">
    <div class="mypage__top">
        <div class="mypage__details">
            <div class="left">
                @if($is_image)
                <img class="profile__img" src="/storage/profile_images/{{ Auth::id() }}.jpg" alt="プロフィール画像">
                @else
                <div class="profile__img-placeholder"></div>
                @endif
                <span class="username"><h1>{{ Auth::user()->profile->user_name }}</h1></span>
            </div>
            <div class="right">
                <a class="profile__edit-btn" href="/profile">プロフィールを編集</a>
            </div>
        </div>
    </div>

    <div class="mypage__tabs">
        <span class="tab active">出品した商品</span>
        <span class="tab">購入した商品</span>
    </div>

    <div class="mypage__bottom">
        <div class="product-grid">
            <div class="product-item">商品画像</div>
            <div class="product-item">商品画像</div>
            <div class="product-item">商品画像</div>
            <div class="product-item">商品画像</div>
            <div class="product-item">商品画像</div>
            <div class="product-item">商品画像</div>
        </div>
    </div>
</div>

@endsection