<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coachtechフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    @yield('css')
</head>

<body>
    <header>
        <h1><img src="img/logo.svg"></h1>
        <input class="header__search" type="search">
        <nav class="header-nav">
            <ul class="header-nav-list">
                @guest
                <li class="header-nav-item"><a class="menu__link" href="/login">ログイン</a></li>
                <li class="header-nav-item"><a class="menu__link" href="/register">会員登録</a></li>
                @endguest

                @if (Auth::check())
                <li class="header-nav-item">
                    <form class="logout__form" action="/logout" method="post">
                        @csrf
                        <button class="logout__btn">ログアウト</button>
                    </form>
                </li>
                <li class="header-nav-item"><a class="menu__link" href="/">マイページ</a></li>
                @endif

                <li class="header-nav-item">出品</li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>