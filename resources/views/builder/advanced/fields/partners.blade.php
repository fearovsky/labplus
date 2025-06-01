<section class="partners">
    <div class="container">
        @if (!empty($field['heading']))
            <p class="text-subheader">
                {{ $field['heading'] }}
            </p>
        @endif

        @if (!empty($field['partners']))
            <div class="splide partners-carousel">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($field['partners'] as $partner)
                            <li class="splide__slide partners-item">
                                @if (empty($partner['link']))
                                    <img class="partners-item__image" src="{{ $partner['logo']['url'] }}"
                                        alt="{{ $partner['logo']['alt'] }}">
                                @else
                                    <a class="partners-item__link" href="{{ $partner['link']['url'] }}"
                                        target="{{ $partner['link']['target'] }}">
                                        <img class="partners-item__image" src="{{ $partner['logo']['url'] }}"
                                            alt="{{ $partner['logo']['alt'] }}">
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
</section>
