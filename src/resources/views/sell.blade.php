@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('main')
<div class="sell__page">
    <h1 class="sell__heading">商品の出品</h1>
    <form class="sell__form" action="{{ route('image_upload') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="sell__wrapper">
            <div class="sell__inner">
                <h2 class="sell__ttl-img">商品画像</h2>
                <div class="sell__content">
                    <label for="img_url" class="img">画像アップロード</label>
                    <input type="file" class="img__input" name="img_url" id="img_url">
                </div>
            </div>

            <div class="sell__inner">
                <h2 class="sell__ttl">商品の詳細</h2>
                <div class="sell__content">
                    <label class="label">カテゴリー</label>
                    <input class="input" type="text" name="category">
                </div>
                <div class="sell__content">
                    <label class="label">商品の状態</label>
                    <input class="input" type="text" name="condition">
                </div>
            </div>

            <div class="sell__inner">
                <h2 class="sell__ttl">商品名と説明</h2>
                <div class="sell__content">
                    <label class="label">商品名</label>
                    <input class="input" type="text" name="name">
                </div>
                <div class="sell__content">
                    <label class="label">商品説明</label>
                    <textarea class="input input__textarea" name="description"></textarea>
                </div>
            </div>

            <div class="sell__inner">
                <h2 class="sell__ttl">販売価格</h2>
                <div class="sell__content">
                    <label class="label">販売価格</label>
                    <input class="input" type="text" name="price" placeholder="¥">
                </div>
            </div>
            <button class="sell__btn" type="submit">出品する</button>
        </div>
    </form>
</div>
@endsection