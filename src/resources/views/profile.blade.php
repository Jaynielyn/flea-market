@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('main')
<form class="profile__form" action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="profile__items">
        <h2 class="setting">プロフィール設定</h2>
    </div>

    <div class="profile__items">
        @if($is_image)
        <img src="/storage/profile_images/{{ Auth::id() }}.jpg" width="100px" height="100px">
        @endif
        <input class="pic__choose" type="file" name="photo">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


    </div>

    <div class="profile__items">
        <label class="profile__label">ユーザー名</label>
        <input class="profile__input" type="text" name="user_name">
    </div>

    <div class="profile__items">
        <label class="profile__label">郵便番号</label>
        <input class="profile__input" type="text" name="postcode">
    </div>

    <div class="profile__items">
        <label class="profile__label">住所</label>
        <input class="profile__input" type="text" name="address">
    </div>

    <div class="profile__items">
        <label class="profile__label">建物名</label>
        <input class="profile__input" type="text" name="building">
    </div>

    <div class="profile__items">
        <button class="btn" type="submit">更新する</button>
    </div>
</form>
@endsection