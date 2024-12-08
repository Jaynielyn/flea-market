@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/item_details.css') }}">
@endsection

<x-admin_header></x-admin_header>

@section('main')
<div class="item-details-container">
    <div class="item-image">
        <img src="{{ \Storage::url($item->img_url) }}" alt="{{ $item->name }}">
    </div>
    <div class="item-info">
        <h2>{{ $item->name }}</h2>
        <p>価格: ¥{{ number_format($item->price) }}</p>
    </div>

    <div class="comments-section">
        <h3>コメント</h3>
        @forelse ($comments as $comment)
        <div class="comment">
            <div class="comment-header">
                <p><strong>{{ $comment->user->profile->user_name ?? '匿名' }}</strong> さん:</p>
                <p class="comment-content">{{ $comment->comment ?? 'コメント内容がありません' }}</p>
            </div>

            <!-- コメント削除フォーム -->
            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('コメントを削除してもよろしいですか？');">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete__comment-btn">コメント削除</button>
            </form>
        </div>

        @empty
        <p>この商品にはコメントがありません。</p>
        @endforelse
    </div>
</div>
@endsection