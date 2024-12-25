@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
    <h2 class="main-title">会員登録</h2>
    <form class="form" action="/register" method="post">
        @csrf
        <div class="input-container">
            <h3>ユーザー名</h3>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="input-container">
            <h3>メールアドレス</h3>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="input-container">
            <h3>パスワード</h3>
            <input type="password" name="password">
            @error('password')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="input-container">
            <h3>確認用パスワード</h3>
            <input type="password" name="password_confirmation">
            @error('password_confirmation')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="btn-container">
            <input type="submit" value="登録する">
        </div>
        <a class="page-link" href="/login">ログインはこちら</a>
    </form>
</div>
@endsection