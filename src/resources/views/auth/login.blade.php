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


<!-- <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">ユーザー名/メールアドレス</span>
        </div> -->
<!-- <div class="form__group-content">
            <div class="form__input--text">
                <input type="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">パスワード</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="password" name="password" />
            </div>
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="form__button">
        <button class="form__button-submit" type="submit">ログインする</button>
    </div>
    </form>
    <div class="register__link">
        <a class="register__button-submit" href="/register">会員登録はこちら</a>
    </div>
</div> -->