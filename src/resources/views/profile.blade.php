@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="user-container">
    <div class="user-image"></div>
    <h2>ユーザー名</h2>
    <a class="profile-edit-button" href="/mypage/profile">プロフィールを編集</a>
</div>

<div class="tab-item__content">
    <div class="tab-item__panel">
        <form class="tab-item__button">
            <button class="tab-item__button-submit" type="submit">出品した商品</button>
        </form>
        <form class="tab-item__button">
            <button class="tab-item__button-submit" type="submit">購入した商品</button>
        </form>
    </div>
</div>

<div class="listcard-container">
    <div class="listcard-item">
        <!-- <div class="img-box"></div> -->
        <a class="img-box" href="/item/:item_id"></a>
        <p>商品名</p>
    </div>

    <div class="listcard-item">
        <!-- <div class="img-box"></div> -->
        <a class="img-box" href="/item/:item_id"></a>
        <p>商品名</p>
    </div>

    <div class="listcard-item">
        <!-- <div class="img-box"></div> -->
        <a class="img-box" href="/item/:item_id"></a>
        <p>商品名</p>
    </div>

    <div class="listcard-item">
        <!-- <div class="img-box"></div> -->
        <a class="img-box" href="/item/:item_id"></a>
        <p>商品名</p>
    </div>
    <div class="listcard-item">
        <!-- <div class="img-box"></div> -->
        <a class="img-box" href="/item/:item_id"></a>
        <p>商品名</p>
    </div>
</div>

@endsection