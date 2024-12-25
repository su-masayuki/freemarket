<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECH</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
    <header>
        <div class="header__inner">
            <div class="header-utilities">
                <img src=" {{asset('storage/logo.svg')}}">

                @if (Auth::check())
                <input type="text" class="search" placeholder="なにをお探しですか？">

                @endif

                <nav>
                    <ul class="header-nav-list">
                        @if (Auth::check())
                        <li class="header-nav-item">
                            <form class="form" action="/logout" method="post">@csrf<button class="header-nav__button">ログアウト</button></form>
                        </li>
                        <li class="header-nav-item"><a class="header-nav-item-mypage" href="/mypage">マイページ</a></li>
                        <li class="header-nav-item"><a class="header-nav-item-sell" href="/sell">出品</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>