<footer class="footer">
    @include('sections.footer.cta-footer')

    @if ($rulesInformation)
        <div class="footer-outer">
            @include ('components.rules-information', [
                'rulesInformation' => $rulesInformation,
            ])
        </div>
    @endif
    <div class="footer-inner">
        <div class="container">
            <div class="footer-main">
                @if (!empty($boxes))
                    <div class="footer-boxes">
                        @foreach ($boxes as $class => $box)
                            <div class="footer-boxes-item">
                                <h4 class="footer-boxes-item__title small">
                                    {{ $box['title'] }}
                                </h4>
                                @if (!empty($box['links']))
                                    <ul class="footer-boxes-item__list">
                                        @foreach ($box['links'] as $item)
                                            <li class="footer-boxes-item__list-item">
                                                <a class="footer-boxes-item__list-link"
                                                    href="{{ $item['link']['url'] }}">
                                                    {{ $item['link']['title'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="footer-main-box">
                    <a class="footer-logo" href="{{ home_url('/') }}">
                        {{ get_svg('resources.images.logo.logo-white-accent', ['class' => 'footer-logo__image']) }}
                    </a>

                    @if (!empty($socialMedia))
                        <ul class="footer-main-social">
                            @foreach ($socialMedia as $item)
                                <li class="footer-main-social__item">
                                    <a class="footer-main-social__link" href="{{ $item['link'] }}">
                                        <img src="{{ $item['icon'] }}" class="" alt="footer-main-social__icon">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="footer-informations">
                @if (!empty($informationBoxes))
                    <ul class="footer-informations-boxes">
                        @foreach ($informationBoxes as $class => $box)
                            <li
                                class="footer-informations-boxes__item footer-informations-boxes__item{{ $class }}">
                                {!! $box !!}
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if (!empty($informationNav))
                    <div class="footer-informations-nav">
                        @foreach ($informationNav as $class => $list)
                            <ul class="footer-informations-nav__list footer-informations-nav__list{{ $class }}">
                                @foreach ($list as $itemNav)
                                    <li
                                        class="footer-informations-nav__list-item footer-informations-nav__list-item--{{ $class }}">
                                        <a class="footer-informations-nav__list-link"
                                            href="{{ $itemNav['link']['url'] }}">
                                            {{ $itemNav['link']['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                @endif

            </div>


            <p class="footer-copy">
                labplus © {{ date('Y') }}. All rights reserved.
            </p>
        </div>
    </div>
</footer>
