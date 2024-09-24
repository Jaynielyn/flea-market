@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main')
<div class="main__login">
    <div class="login__ttl-top">
        <h1 class="login__ttl">ログイン</h1>
    </div>
    <form class="form" action="/login" method="post">
        @csrf
        <div class="login__form">
            <label class="login__form-label">メールアドレス</label>
            <input class="login__input input__email" type="email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="login__form">
            <label class="login__form-label">パスワード</label>
            <input class="login__input input__pass" type="password" name="password" />
        </div>
        <div class="login__form">
            <input class="input__btn" type="submit" value="ログインする">
        </div>

        <div class="login__link">
            <a class="link" href="http://localhost/register">会員登録はこちら</a>
        </div>
    </form>
</div>
@endsection