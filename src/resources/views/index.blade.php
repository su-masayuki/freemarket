@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="tab-item__content">
    <div class="tab-item__panel">
        <form class="tab-item__button">
            <button class="tab-item__button-submit" type="submit">おすすめ</button>
        </form>
        <form class="tab-item__button">
            <button class="tab-item__button-submit" type="submit">マイリスト</button>
        </form>
    </div>
</div>

<div class="listcard-container">

    <div class="listcard-item">
        <div class="img-box"></div>
        <p>商品名</p>
    </div>

    <div class="listcard-item">
        <div class="img-box"></div>
        <p>商品名</p>
    </div>

    <div class="listcard-item">
        <div class="img-box"></div>
        <p>商品名</p>
    </div>

    <div class="listcard-item">
        <div class="img-box"></div>
        <p>商品名</p>
    </div>
    <div class="listcard-item">
        <div class="img-box"></div>
        <p>商品名</p>
    </div>
</div>
@endsection