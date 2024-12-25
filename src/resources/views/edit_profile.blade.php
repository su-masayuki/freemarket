@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
@endsection

@section('content')
<div class="profile-edit-content">
    <h2 class="main-title">プロフィール設定</h2>
</div>

<div class="user-container">
    <div class="user-image"></div>
    <a class="profile-edit-button" href="/mypage/profile">画像を選択する</a>
</div>

<form class="form" action="/login" method="post">
    @csrf
    <div class="input-container">
        <h3>ユーザー名</h3>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="input-container">
        <h3>郵便番号</h3>
        <input type="number" name="address-number" value="{{ old('email') }}">
        @error('address-number')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="input-container">
        <h3>住所</h3>
        <input type="text" name="address">
        @error('address')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="input-container">
        <h3>建物名</h3>
        <input type="text" name="building">
        @error('building')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="btn-container">
        <input type="submit" value="更新する">
</form>
@endsection