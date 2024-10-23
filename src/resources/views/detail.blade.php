@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="detail__page">
    <form>
        @csrf
        <!-- 画像 -->
        <div class="detail__form">
            <div class="detail__image">
                <img class="detail__img" src="images/noimage.png" width="10%">
            </div>
        </div>

        <!-- 商品名 -->
        <div class="detail__form">
            <div class="detail__items">
                <div class="detail__ttl">
                    <h1 class="product__name">商品名</h1>
                </div>
                <div class="detail__brand">
                    <p class="brand__name">ブランド名</p>
                </div>
                <div class="detail__act">
                    <div class="act__star">
                        <img class="stars" src="images/star-regular.svg" width="15%">
                    </div>
                    <div class="act__comment">
                        <img class="comments" src="images/comment-regular.svg" width="15%">
                    </div>
                </div>
                <div class="detail__btn">
                    <input class="btn" type="submit" value="購入する">
                </div>
            </div>

            <!-- 説明 -->
            <div class="detail__items">
                <div class="detail__ttl">
                    <h2 class="description">商品説明</h2>
                </div>
                <div class="detail__color">
                    <p class="color"></p>
                </div>
                <div class="description">
                    <p class="description__conten"></p>
                </div>
            </div>

            <!-- 情報 -->
            <div class="detail__items">
                <div class="detail__ttl">
                    <h2 class="detail__h2">商品の情報</h2>
                </div>
                <div class="detail__category">
                    <p class="category">カテゴリー</p>
                </div>
                <div class="detail__condition">
                    <p class="condition"></p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection