@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell__content">
    <h2 class="main-title">商品の出品</h2>
    <form class="form" action="/register" method="post">
        @csrf
        <div class="sell-container">
            <h3>商品画像</h3>
            <!-- <form class="form" action="/register" method="post"> -->
            <div class="sell-container-circle">
                <a class="img-button" href="/mypage/profile">画像を選択する</a>
            </div>
        </div>
    </form>

    <div class="category-container">
        <h2>商品の詳細</h2>
        <h3>カテゴリー</h3>
        <div class="category-label">
            <div class="category-item">ファッション</div>
            <div class="category-item">家電</div>
            <div class="category-item">インテリア</div>
            <div class="category-item">レディース</div>
            <div class="category-item">メンズ</div>
            <div class="category-item">コスメ</div>
            <div class="category-item">本</div>
            <div class="category-item">ゲーム</div>
            <div class="category-item">スポーツ</div>
            <div class="category-item">キッチン</div>
            <div class="category-item">ハンドメイド</div>
            <div class="category-item">アクセサリー</div>
            <div class="category-item">おもちゃ</div>
            <div class="category-item">ベビー・キッズ</div>
        </div>
        <h3>商品の状態</h3>
        <div class="condition">選択してください</div>
        <div class="search-condition">
            <select class="search-condition-select" name="condition">
                <option value="良好">良好</option>
                <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
                <option value="やや傷や汚れあり">やや傷や汚れあり</option>
                <option value="状態が悪い">状態が悪い</option>
            </select>
        </div>
    </div>

    <div class="content-container">
        <h2>商品名と説明</h2>
        <div class="input-container">
            <h3>商品名</h3>
            <input type="text" name="item-name" value="{{ old('item-name') }}">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="input-container">
            <h3>商品の説明</h3>
            <input class="item-content" type="text" name="item-content" value="{{ old('item-content') }}">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="input-container">
            <h3>販売価格</h3>
            <input type="text" placeholder="¥" name="item-price" value="{{ old('item-price') }}">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="btn-container">
            <input type="submit" value="出品する">
        </div>


    </div>
    @endsection