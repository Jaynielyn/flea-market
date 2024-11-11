@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
<x-header></x-header>

@section('main')
<div class="profile__page">
    <form class="profile__form" action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="profile__heading">プロフィール設定</h2>

        <div class="profile__image-section">
            <!-- Profile image -->
            @if($is_image)
            <img class="profile__img" src="/storage/profile_images/{{ Auth::id() }}.jpg" alt="プロフィール画像">
            @else
            <img class="profile__img" src="/img/default-profile.png" alt="デフォルトプロフィール画像">
            @endif

            <!-- Choose file button -->
            <label class="pic__choose-label" for="photo">画像を選択する</label>
            <input class="pic__choose" type="file" name="photo" id="photo">
        </div>

        <div class="profile__items">
            <label class="profile__label" for="user_name">ユーザー名</label>
            <input class="profile__input" type="text" name="user_name" id="user_name">
        </div>

        <div class="profile__items">
            <label class="profile__label" for="postcode">郵便番号</label>
            <input class="profile__input" type="text" name="postcode" id="postcode">
        </div>

        <div class="profile__items">
            <label class="profile__label" for="address">住所</label>
            <input class="profile__input" type="text" name="address" id="address">
        </div>

        <div class="profile__items">
            <label class="profile__label" for="building">建物名</label>
            <input class="profile__input" type="text" name="building" id="building">
        </div>

        <button class="profile__submit-btn" type="submit">更新する</button>
    </form>
</div>


@endsection