@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('main')
<div class="mypage__page">
    <div class="mypage__top">
        <div class="mypage__details">
            <div class="left">
                @if($is_image)
                <img class="img" src="/storage/profile_images/{{ Auth::id() }}.jpg" width="100px" height="100px">
                @endif
            </div>

            <div class="right">
                <a class="profile__edit-btn" href="/profile">プロフィールを編集</a>
            </div>
        </div>
    </div>

    <div class="mypage__bottom">
    </div>
</div>
@endsection