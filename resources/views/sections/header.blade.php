<header class="header">
    <div class="header-top">
        @include('components.language-switcher')

        @if (!empty($socialMedia))
            <ul class="header-top-social">
                @foreach ($socialMedia as $item)
                    <li class="header-top-social__item">
                        <a class="header-top-social__link" href="{{ $item['link'] }}">
                            <img src="{{ $item['icon'] }}" class="" alt="header-top-social__icon">
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</header>

<header class="banner">
    <a class="brand" href="{{ home_url('/') }}">
        {!! $siteName !!}
    </a>

    @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
        </nav>
    @endif
</header>
