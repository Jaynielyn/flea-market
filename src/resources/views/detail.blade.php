@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection
<x-header></x-header>

@section('main')
<div class="detail__page">
    <form method="get">
        @csrf
        <!-- 画像 -->
        <div class="detail__form form__left">
            <div class="detail__image">
                <img class="detail__img" src="{{ $item->img_url ? asset('storage/' . $item->img_url) : asset('img/noimage.png') }}">
            </div>
        </div>

        <!-- 商品名と情報 -->
        <div class="detail__form form__right">
            <div class="detail__items">
                <div class="detail__ttl">
                    <h1 class="product__name">{{ $item->name ?? '商品名' }}</h1>
                    <p class="brand__name">{{ $item->brand ?? 'ブランド名' }}</p>
                    <p class="price">¥{{ $item->price ?? '値段' }}</p>
                </div>

                <!-- いいねとコメント機能 -->
                <div class="detail__act">
                    <!-- いいね機能 -->
                    

                    <!-- コメント機能 -->
                    <a href="{{ route('comment.show', ['item_id' => $item->id]) }}" class="act__comment">
                        <img class="comments" src="{{ asset('img/comment-regular.svg') }}" alt="コメント">
                        <span id="commentCount" class="act__count">{{ $item->comments ? $item->comments->count() : 0 }}</span>
                    </a>


                </div>
            </div>

            <div class="detail__btn">
                <a class="btn" href="{{ route('purchase', ['id' => $item->id]) }}">購入する</a>
            </div>

            <!-- 説明 -->
            <div class="detail__items detail__info">
                <h2 class="section__title">商品説明</h2>
                <p class="detail__color">カラー：<span>グレー</span></p>
                <p class="description__content">{{ $item->description ?? '商品の状態は良好です。傷もありません。' }}</p>
            </div>

            <!-- 情報 -->
            <div class="detail__items detail__info">
                <h2 class="section__title">商品の情報</h2>
                <div class="detail__sub">
                    <label class="label">カテゴリー：</label>
                    <div class="content__txt">
                        <p class="category__txt">洋服</p>
                        <p class="category__txt">メンズ</p>
                    </div>
                </div>
                <div class="detail__sub detail__condition">
                    <label class="label">商品の状態：</label>
                    <div class="content__txt">
                        <p class="condition__txt">良好</p>
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection