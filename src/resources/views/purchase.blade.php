@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="left-side">
    <div class="confirmation-container">
        <div class="confirmation-item">
            <div class="img-box">商品画像</div>
            <h2 class="item-name">商品名</h2>
            <h2 class="item-price">¥47,000</h2>
        </div>

        <div class="confirmation-payment">
            <h3>支払い方法</h3>
            <div class="search-payment">
                <select class="search-payment-select" name="condition">
                    <option value="コンビニ払い">コンビニ払い</option>
                    <option value="カード支払い">カード支払い</option>
                </select>
            </div>
        </div>

        <div class="confirmation-address">
            <h3>配送先</h3>

            <div class="btn-container">
                <a href="/purchase/address/:item_id">変更する</a>
            </div>

            <h3>XXX-YYYY</h3>
            <h3> ここには住所と建物が入ります</h3>

        </div>
    </div>
</div>
<div class="right-side">
    <div class="confirmation-final">
        <div class="price-row">
            <h3>商品代金</h3>
            <h3>¥47,000</h3>
        </div>
        <div class="payment-row">
            <h3>支払い方法</h3>
            <h3>コンビニ払い</h3>
        </div>
    </div>



    <div class="btn-container">
        <input class="" type="submit" value="購入する">
    </div>
</div>
@endsection