@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('main')
<h1 class="register__ttl">会員登録</h1>
<form class="form" action="/register" method="post">
    @csrf
    <div class="register__form">
        <label class="register__form-label">メールアドレス</label>
        <input class="register__input input__email" type="email" name="email" value="{{ old('email') }}" />
    </div>
    <div class="register__form">
        <label class="register__form-label">パスワード</label>
        <input class="register__input input__pass" type="password" name="password" />
    </div>
    <div class="register__form">
        <input class="register__input input__btn" type="submit" value="登録する">
    </div>
    <div class="register__link">
        <a class="link" href="http://localhost/login">ログインはこちら</a>
    </div>
</form>
@endsection