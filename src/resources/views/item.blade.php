@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="item-detail-container">
    <div class="item-img-container">
        <div class="img-box">
            <img src="{{ $item->item_url }}" alt="{{ $item->item_name }}">
        </div>
    </div>

    <div class="item-info-container">
        <h2 class="item-name">{{ $item->item_name }}</h2>
        <div class="brand-name">ブランド名</div>
        <h2>¥{{ number_format($item->price) }} (税込)</h2>

        <div class="like">
            <form action="{{ route('like.toggle', ['item' => $item->id]) }}" method="POST">
                @csrf
                <button type="submit" class="like-btn" style="background: none; border: none;">
                    @if(Auth::check() && $item->isLikedBy(Auth::user()))
                    <img src="{{ asset('storage/filled_star.svg') }}" alt="Liked">
                    @else
                    <img src="{{ asset('storage/star.svg') }}" alt="Like">
                    @endif
                </button>
            </form>
            <span class="like-count">{{ $item->likes->count() }}</span>
        </div>
        <div class="comment">
            <img src="{{ asset('storage/comment.svg') }}" alt="Comment">
            <div class="comment-count">{{ $item->comments->count() }}</div>
        </div>

        <div class="btn-container">
            <a href="{{ route('item.purchase', ['item_id' => $item->id]) }}" class="btn-purchase">購入手続きへ</a>
        </div>

        <h2>商品説明</h2>
        <div>{{ $item->item_describe }}</div>

        <h2>商品の情報</h2>
        <div class="frame">
            <div class="item-title">
                <h3>カテゴリー</h3>
            </div>
            <div class="item-category">
                <div class="category-label">洋服</div>
                <div class="category-label">メンズ</div>
            </div>
        </div>
        <div class="item-title">
            <h3>商品の状態</h3>
        </div>
        <div>{{ $item->item_condition ?? '情報なし' }}</div>

        <h2>コメント ({{ $item->comments->count() }})</h2>
        @foreach ($item->comments as $comment)
        <h3>{{ $comment->user->name }}</h3>
        <div class="comment-list">{{ $comment->content }}</div>
        <small>{{ $comment->created_at->format('Y-m-d H:i') }}</small>
        @endforeach

        @auth
        <h3>商品へのコメント</h3>
        <form action="{{ route('comment.store', ['id' => $item->id]) }}" method="POST">
            @csrf
            <div class="comment-form">
                <textarea name="content" placeholder="コメントを入力してください" required maxlength="255"></textarea>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn-comment-submit">コメントを送信する</button>
            </div>
        </form>
        @else
        <p><a href="{{ route('login') }}">ログイン</a>するとコメントを投稿できます。</p>
        @endauth
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.like-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                let itemId = this.dataset.itemId;
                let likeCountElement = this.nextElementSibling;

                fetch(`/like/${itemId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.liked) {
                            this.src = "{{ asset('storage/filled_star.svg') }}";
                        } else {
                            this.src = "{{ asset('storage/star.svg') }}";
                        }
                        likeCountElement.textContent = data.like_count;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

@endsection