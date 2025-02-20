@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
@endsection

@section('content')
<div class="profile-edit-content">
    <h2 class="main-title">プロフィール設定</h2>
</div>

<form class="form" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="user-container">
        <div class="user-image">
            @if ($profile->profile_image)
            <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="プロフィール画像" class="profile-img">
            @else
            <img src="{{ asset('images/default.png') }}" alt="デフォルト画像" class="profile-img">
            @endif
        </div>
        <label class="profile-edit-button">
            画像を選択する
            <input type="file" name="profile_image" class="hidden-input">
        </label>
        @error('profile_image')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="input-container">
        <h3>ユーザー名</h3>
        <input type="text" name="name" value="{{ old('name', $profile->user->name ?? '') }}" placeholder="ユーザー名">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="input-container">
        <h3>郵便番号</h3>
        <input type="number" name="address_number" value="{{ old('address_number', $profile->address_number) }}" placeholder="郵便番号">
        @error('address_number')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="input-container">
        <h3>住所</h3>
        <input type="text" name="address" value="{{ old('address', $profile->address) }}" placeholder="住所">
        @error('address')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="input-container">
        <h3>建物名</h3>
        <input type="text" name="building" value="{{ old('building', $profile->building) }}" placeholder="建物名">
        @error('building')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="btn-container">
        <input type="submit" value="更新する" class="btn-update">
    </div>
</form>
@endsection