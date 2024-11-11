@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection
<x-header></x-header>

@section('main')
<form class="purchase__page" action="{{ route('purchase.store') }}" method="POST">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <!-- 左側 -->
    <div class="purchase__left">
        <div class="left__top">
            <div class="items__inner">
                <img class="img" src="{{ $item->img_url ? asset('storage/' . $item->img_url) : asset('img/noimage.png') }}">
            </div>
            <div class="items__inner items__name">
                <h1 class="product__name">{{ $item->name ?? '商品名' }}</h1>
                <p class="price">¥{{ $item->price ?? '値段' }}</p>
            </div>
        </div>

        <div class="left__items left__second">
            <div class="items__ttl">
                <h2>支払い方法</h2>
            </div>
            <div class="items__link">
                <a href="">変更する</a>
            </div>
        </div>

        <div class="left__items left__third">
            <div class="items__ttl">
                <h2>配送先</h2>
            </div>
            <div class="items__link">
                <a href="{{ route('purchase.addressForm') }}">変更する</a>
            </div>
        </div>

        <!-- この後修正必須 -->
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <!-- 右側 -->
    <div class="purchase__right">
        <div class="box">
            <div class="box__top">
                <div class="box__inner">
                    <label>商品代金</label>
                    <p>¥{{ $item->price ?? '値段' }}</p>
                </div>
            </div>
            <div class="box__bottom">
                <div class="box__inner">
                    <label>支払い金額</label>
                    <p>¥{{ $item->price ?? '値段' }}</p>
                </div>
                <div class="box__inner box__bottom-inner">
                    <label>支払い金額</label>
                    <p>コンビニ払い</p>
                </div>
            </div>
        </div>

        <button class="btn" type="submit">購入する</button>
    </div>
</form>
@endsection