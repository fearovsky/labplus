<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-content">
                @include('components.language-switcher', ['classes' => 'header-top-switcher'])

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
        </div>
    </div>

    <div class="header-main">
        <div class="container">
            <div class="header-main-content">
                <a class="header-main-logo" href="{{ home_url('/') }}">
                    {{ get_svg('resources.images.logo.logo', ['class' => 'header-main-logo__image']) }}
                </a>

                @if (has_nav_menu('primary_navigation'))
                    <nav class="header-main-nav nav" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
                        {!! wp_nav_menu([
                            'theme_location' => 'primary_navigation',
                            'menu_class' => 'nav__list',
                            //wrapper
                            'container' => null,
                            'echo' => false,
                        ]) !!}
                    </nav>
                @endif
            </div>
        </div>
    </div>
</header>
