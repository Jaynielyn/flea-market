@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('main')
<div class="address__page">
    <div class="address__ttl">
        <h1 class="ttl">住所の変更</h1>
    </div>

    <form class="address__content" action="{{ route('purchase.updateAddress') }}" method="POST">
        @csrf
        <div class="inner">
            <label class="inner__label">
                <h2 class="inner__ttl">郵便番号</h2>
            </label>
            <input class="inner__input" type="text" name="postcode" id="postcode" value="{{ old('postcode', $profile->postcode ?? '') }}">
        </div>
        <div class="inner">
            <label class="inner__labe">
                <h2 class="inner__ttl">住所</h2>
            </label>
            <input class="inner__input" type="text" name="address" id="address" value="{{ old('address', $profile->address ?? '') }}">
        </div>
        <div class="inner">
            <label class="inner__labe">
                <h2 class="inner__ttl">建物</h2>
            </label>
            <input class="inner__input" type="text" name="building" id="building" value="{{ old('building', $profile->building ?? '') }}">
        </div>
        <button class="btn" type="submit">更新する</button>
    </form>
</div>
@endsection