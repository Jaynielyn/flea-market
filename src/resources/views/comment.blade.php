@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection
<x-header></x-header>

@section('main')
<div class="comment__page">
    <div class="comment__left">
        <img class="detail__img" src="{{ $item->img_url ? asset('storage/' . $item->img_url) : asset('img/noimage.png') }}" width="15%">
    </div>

    <div class="comment__right">
        <div class="detail__ttl">
            <h1 class="product__name">{{ $item->name ?? '商品名' }}</h1>
            <p class="brand__name">{{ $item->brand ?? 'ブランド名' }}</p>
            <p class="price">¥{{ $item->price ?? '値段' }}</p>
            <div class="detail__act">
                <div class="act__star">
                    <img class="stars" src="{{ asset('img/star-regular.svg') }}" width="5%">
                    <span class="act__count"></span>
                </div>
                <div class="act__comment">
                    <img class="comments" src="{{ asset('img/comment-regular.svg') }}" width="5%">
                    <span id="commentCount" class="act__count">{{ $item->comments ? $item->comments->count() : 0 }}</span>
                </div>
            </div>
        </div>

        <div class="comment__content">
            <ul class="comment__list">
                @foreach($comments as $comment)
                @if($comment->user_id === auth()->id())
                <!-- 自分のコメント -->
                <li class="my__comment section">
                    <div class="comment__info my__comment-info">
                        <span class="user__name">{{ $comment->user->profile->user_name }}</span>
                        <img src="/storage/profile_images/{{ $comment->user->id }}.jpg" alt="プロフィール画像" class="profile__img" width="5%">
                    </div>
                    <span class="my__comment-text">{{ $comment->comment }}</span>
                </li>
                @else
                <!-- 他のユーザーのコメント -->
                <li class="other__comment section">
                    <div class="comment__info other__comment-info">
                        <img src="/storage/profile_images/{{ $comment->user->id }}.jpg" alt="プロフィール画像" class="profile__img" width="5%">
                        <span class="user__name">{{ $comment->user->profile->user_name }}</span>
                    </div>
                    <span class="other__comment-text">{{ $comment->comment }}</span>
                </li>
                @endif
                @endforeach
            </ul>


            <!-- コメント投稿フォーム -->
            <form class="comment__form" action="{{ route('product.comment.store', ['item_id' => $item->id]) }}" method="POST">
                @csrf
                <label class="comment__label" for="comment">商品へのコメント</label>
                <textarea name="comment"></textarea>
                <button class="comment__btn" type="submit">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>

@endsection