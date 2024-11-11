<header class="header">
    <div class="header__container">
        <div class="header__logo">
            <a href="/"><img src="{{ asset('img/logo.svg') }}" alt="Sample Logo"></a>
        </div>
        <div class="header__search">
            <input class="header__search-input" type="text" placeholder="なにをお探しですか？">
        </div>
        <nav class="header__menu">
            <ul class="header__menu-list">
                @guest
                <li><a class="menu__link" href="/login">ログイン</a></li>
                <li><a class="menu__link" href="/register">会員登録</a></li>
                <li class="sell__btn"><a class="sell__link-btn" href="/sell">出品</a></li>
                @endguest

                @auth
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="menu__link" type="submit">ログアウト</button>
                    </form>
                </li>
                <li><a class="menu__link" href="/mypage">マイページ</a></li>
                <li class="sell__btn"><a class="sell__link-btn" href="/sell">出品</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>