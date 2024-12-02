@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('main')
<x-logo></x-logo>

<div class="register__page">
    <form class="form" action="{{ route('admin.register.submit') }}" method="post">
        @csrf
        <div class="register__form">
            <h1 class="register__ttl">管理画面<br>会員登録</h1>
        </div>

        <div class="register__form form__item">
            <label class="register__form-label" for="name">名前</label>
            <input class="register__input input__name" id="name" type="text" name="name" required autofocus>

            @if ($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="register__form form__item">
            <label class="register__form-label">メールアドレス</label>
            <input class="register__input input__email" type="email" name="email" value="{{ old('email') }}" />

            @if ($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="register__form form__item">
            <label class="register__form-label">パスワード</label>
            <input class="register__input input__pass" type="password" name="password" />

            @if ($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <div class="register__form form__btn">
            <input class="register__input input__btn" type="submit" value="登録する">
        </div>

        <div class="register__form">
            <a class="link" href="http://localhost/admin/login">ログインはこちら</a>
        </div>
    </form>
</div>
@endsection