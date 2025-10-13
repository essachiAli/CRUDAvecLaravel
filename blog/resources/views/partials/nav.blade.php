
<nav>
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
    <a href="{{ route('articles.index') }}" class="{{ request()->routeIs('article.s*' ? 'active' : '') }}">Articles</a>
    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
    <a href="{{ route('contact') }}" class="{{ request()->routeIs('about') ? 'active' : ''}}">Contact</a>
</nav>
