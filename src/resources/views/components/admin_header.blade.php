<div class="header">
    <div class="header__container">
        <div class="header__logo admin__logo">
            <a href="/"><img src="{{ asset('img/logo.svg') }}" alt="Sample Logo"></a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="menu__link" type="submit">ログアウト</button>
            </form>
        </div>
    </div>
</div>