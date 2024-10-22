<div class="header__menu">
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
            <li class="header-nav-item"><a class="menu__link" href="/mypage">マイページ</a></li>
            @endif

            <li class="header-nav-item">
                <a href="/sell">出品</a>
            </li>
        </ul>
    </nav>
</div>