@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="top__page-top">
    <a class="recommendation">おすすめ</a>
    <a class="top__mypage">マイページ</a>
</div>
@endsection