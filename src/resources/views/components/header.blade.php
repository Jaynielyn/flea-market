<div class="header__logo">
    <a href="/"><img src="img/logo.svg"></a>
    @if(Auth::check())
    <x-menu />
    @endif
</div>