@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="tab-item__content">
    <div class="tab-item__panel">
        <form class="tab-item__button" action="{{ route('items.index') }}" method="GET">
            <button class="tab-item__button-submit" type="submit">おすすめ</button>
        </form>
        <form class="tab-item__button" action="{{ route('items.liked') }}" method="GET">
    <button class="tab-item__button-submit" type="submit">マイリスト</button>
</form>
    </div>
</div>

<div class="listcard-container">
    @foreach($items as $item)
    <a class="listcard-item" href="{{ route('item.show', ['id' => $item->id]) }}">
        <div class="img-container">
            <img class="img-box"
                src="{{ Str::startsWith($item->item_url, 'http') ? $item->item_url : asset('storage/' . $item->item_url) }}"
                alt="{{ $item->item_name }}">
            @if ($item->is_sold)
            <div class="sold-overlay">SOLD</div>
            @endif
        </div>
        <div class="item-info">
            <p class="item-name">{{ $item->item_name }}</p>
            @if ($item->is_sold)
            <p class="sold-text"><span class="sold">SOLD</span></p>
            @endif
        </div>
    </a>
    @endforeach
</div>

@endsection