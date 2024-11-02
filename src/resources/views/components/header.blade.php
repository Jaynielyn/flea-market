<div class="header__logo">
    <a href="/"><img src="{{ asset('img/logo.svg') }}" alt="Sample Image"></a>
    @if(Auth::check())
    <x-menu />
    @endif
</div>