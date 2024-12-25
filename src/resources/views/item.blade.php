@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="item-img-container">
    <div class="img-box">商品画像
    </div>
</div>

<div class="item-container">
    <h2 class="item-name">商品名がここに入る</h2>
    <div>ブランド名</div>
    <h2>¥47,000(税込)</h2>
    <div class="review">
        <img src=" {{asset('storage/star.svg')}}">
        <div class="review-count">3</div>
    </div>
    <div class="comment">
        <img src=" {{asset('storage/comment.svg')}}">
        <div class="comment-count">1</div>
    </div>
    <div class="btn-container">
        <a href="/purchase/:item_id">購入手続きへ</a>
    </div>
    <h2>商品説明</h2>
    <div>カラー:グレー</div>
    <div>新品</div>
    <div>商品の状態は良好です。傷もありません。</div>
    <br>
    <div>購入後、即発送致します。</div>
    <h2>商品の情報</h2>
    <div class="waku">
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
    <h2>コメント(1)</h2>
    <h3>admin</h3>
    <div class="comment-list">こちらにコメントが入ります</div>
    <h3>商品へのコメント</h3>
    <div class="comment-form"></div>
    <div class="btn-container">
        <input type="submit" value="コメントを送信する">
    </div>

</div>
@endsection