<header class="header">
    <h1 class="header__title"><a href="/">travel</a></h1>
    <ul class="header__nav">
        <li><a href="/">MYPAGE</a></li>
        <li><a href="/timeline">TIMELINE</a></li>
        <li><a href="/create">POST</a></li>
        <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <input type="submit" value="logout" class="button">
            </form>
        </li>
    </ul>
    <div class="header__search">
        <input type="text" class="header__search-text">
        <button class="button">search</button>
    </div>
</header>