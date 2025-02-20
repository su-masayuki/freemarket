@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="user-container">
    <div class="user-image"
        style="background-image: url('{{ Auth::user()->profile && Auth::user()->profile->profile_image ? asset('storage/' . Auth::user()->profile->profile_image) : asset('images/default-profile.svg') }}')">
    </div>
    <h2>{{ Auth::user()->name }}</h2>
    <a class="profile-edit-button" href="{{ route('profile.edit') }}">プロフィールを編集</a>
</div>

<div class="tab-item__content">
    <div class="tab-item__panel">
        <form class="tab-item__button" id="tab-sold-items" onclick="showSoldItems()">
            <button class="tab-item__button-submit" type="button">出品した商品</button>
        </form>
        <form class="tab-item__button" id="tab-purchased-items" onclick="showPurchasedItems()">
            <button class="tab-item__button-submit" type="button">購入した商品</button>
        </form>
    </div>
</div>

<div class="listcard-container">
    <div id="sold-items" class="listcard-items">
        @forelse($soldItems as $item)
        <div class="listcard-item">
            <a class="img-box" href="{{ route('item.show', ['id' => $item->id]) }}">
                <img src="{{ asset('storage/' . $item->item_url) }}" alt="{{ $item->item_name }}" class="item-image">
            </a>
            <p>{{ $item->item_name }}</p>
        </div>
        @empty
        <p></p>
        @endforelse
    </div>

    <div id="purchased-items" class="listcard-items" style="display: none;">
        @forelse($purchasedItems as $order)
        <div class="listcard-item">
            <a class="img-box" href="{{ route('item.show', ['id' => $order->item->id]) }}">
                <img src="{{ asset('storage/' . $order->item->item_url) }}" alt="{{ $order->item->item_name }}" class="item-image">
            </a>
            <p>{{ $order->item->item_name }}</p>
        </div>
        @empty
        <p></p>
        @endforelse
    </div>
</div>

@endsection

@section('js')
<script>
    function showSoldItems() {
        document.getElementById('sold-items').style.display = 'flex';
        document.getElementById('purchased-items').style.display = 'none';
    }

    function showPurchasedItems() {
        document.getElementById('sold-items').style.display = 'none';
        document.getElementById('purchased-items').style.display = 'flex';
    }
</script>
@endsection