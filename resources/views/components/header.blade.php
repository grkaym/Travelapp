<header class="header">
    <div class="header__container">
        <h1 class="header__title"><a href="/">travel</a></h1>
        <ul class="header__nav">
            <li><a href="/">マイページ</a></li>
            <li><a href="/timeline">投稿を見る</a></li>
            <li><a href="/create">投稿する</a></li>
            <li><a href="/logout" class="header--logout">ログアウト</a></li>
        </ul>
    </div>
    <form action="/search" method="get">
        <div class="header__search">
            <input type="text" class="header__search-text" name="keyword">
            <button class="header__search-button" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            
        </div>
    </form>
</header>