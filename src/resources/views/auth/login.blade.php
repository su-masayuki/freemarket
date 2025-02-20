@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login__content">
    <h2 class="main-title">ログイン</h2>
    <form class="form" action="/login" method="post">
        @csrf

        <div class="input-container">
            <h3>ユーザー名/メールアドレス</h3>
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
        <div class="btn-container">
            <input type="submit" value="ログインする">
            <a class="page-link" href="/register">会員登録はこちら</a>
        </div>
    </form>
</div>
@endsection

