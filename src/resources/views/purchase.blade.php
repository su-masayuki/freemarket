@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase-container">

    <div class="left-side">
        <div class="section-card">
            <div class="item-header">
                <div class="item-image">
                    <img src="{{ $item->item_url }}" alt="商品画像">
                </div>
                <div class="item-info">
                    <h2 class="item-name">{{ $item->item_name }}</h2>
                    <p class="item-price">¥{{ number_format($item->price) }}</p>
                </div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-header">
                <h3>支払い方法</h3>
                <div class="payment-select">
                    <select name="payment_method" id="payment-method">
                        <option value="コンビニ払い">コンビニ払い</option>
                        <option value="クレジットカード">クレジットカード</option>
                        <option value="銀行振込">銀行振込</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="section-card">
            <div class="section-header">
                <h3>配送先</h3>
                <a href="{{ route('address.edit', ['item_id' => $item->id]) }}" class="edit-link">変更する</a>
            </div>
            <div class="address-details">
                <p>〒{{ $profile->address_number }}</p>
                <p>{{ $profile->address }}</p>
                <p>{{ $profile->building ?? '' }}</p>
            </div>
        </div>
    </div>

    <div class="right-side">
        <div class="summary-card">
            <div class="summary-item">
                <span>商品代金</span>
                <span>¥{{ number_format($item->price) }}</span>
            </div>
            <div class="summary-item">
                <span>支払い方法</span>
                <span id="payment-summary">コンビニ払い</span>
            </div>
            <form action="{{ route('purchase.store', ['item' => $item->id]) }}" method="POST">
                @csrf
                <button type="submit" class="purchase-button">購入する</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        var paymentMethodSelect = document.getElementById('payment-method');

        var paymentSummary = document.getElementById('payment-summary');

        console.log("JavaScript loaded successfully!");

        paymentMethodSelect.addEventListener('change', function() {
            var selectedPaymentMethod = this.value;

            console.log("Selected Payment Method:", selectedPaymentMethod);

            paymentSummary.textContent = selectedPaymentMethod;
        });
    });
</script>
@endsection