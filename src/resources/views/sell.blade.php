@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell__content">
    <h2 class="main-title">商品の出品</h2>
    <form class="form" action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="sell-container">
            <h3>商品画像</h3>
            <div class="sell-container-circle">
                <label for="item-url" class="img-button">画像を選択する</label>
                <input type="file" id="item-url" name="item_url" style="display: none;">
                @error('item_url')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="category-container">
            <h2>商品の詳細</h2>
            <h3>カテゴリー</h3>
            <div class="category-label">
                <select name="category" class="category-select">
                    @foreach (['ファッション', '家電', 'インテリア', 'レディース', 'メンズ', 'コスメ', '本', 'ゲーム', 'スポーツ', 'キッチン', 'ハンドメイド', 'アクセサリー', 'おもちゃ', 'ベビー・キッズ'] as $category)
                    <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <h3>商品の状態</h3>
            <div class="search-condition">
                <select class="search-condition-select" name="condition">
                    <option value="良好" {{ old('condition') == '良好' ? 'selected' : '' }}>良好</option>
                    <option value="目立った傷や汚れなし" {{ old('condition') == '目立った傷や汚れなし' ? 'selected' : '' }}>目立った傷や汚れなし</option>
                    <option value="やや傷や汚れあり" {{ old('condition') == 'やや傷や汚れあり' ? 'selected' : '' }}>やや傷や汚れあり</option>
                    <option value="状態が悪い" {{ old('condition') == '状態が悪い' ? 'selected' : '' }}>状態が悪い</option>
                </select>
                @error('condition')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="content-container">
            <h2>商品名と説明</h2>
            <div class="input-container">
                <h3>商品名</h3>
                <input type="text" name="item_name" value="{{ old('item_name') }}">
                @error('item_name')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-container">
                <h3>商品の説明</h3>
                <textarea class="item-content" name="item_description">{{ old('item_description') }}</textarea>
                @error('item_description')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-container">
                <h3>販売価格</h3>
                <input type="" placeholder="¥" name="item_price" value="{{ old('item_price') }}">
                @error('item_price')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="btn-container">
                <input type="submit" value="出品する">
            </div>
        </div>
    </form>
</div>
@endsection