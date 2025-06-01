<section class="hero-section-image hero-section-image--smallp">
    <div class="container hero-section-image-container">
        <div class="hero-section-image-row">
            <div class="hero-section-image-content">
                @if ($hero['title'])
                    <h1 class="hero-section-image-content__heading">
                        {!! $hero['title'] !!}
                    </h1>
                @endif

                @if ($hero['content'])
                    <p class="hero-section-image-content__text">
                        {!! $hero['content'] !!}
                    </p>
                @endif

                @if (!empty($hero['button']))
                    <a class="btn btn-secondary" href="{{ $hero['button']['url'] }}"
                        target="{{ $hero['button']['target'] }}">
                        {{ $hero['button']['title'] }}
                    </a>
                @endif
            </div>

            @if (!empty($hero['testimonials']))
                <div class="hero-section-image-slider">
                    <div class="splide">
                        <ul class="splide__pagination">
                        </ul>
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($hero['testimonials'] as $testimonial)
                                    <li class="splide__slide">
                                        <div class="testimonial-box">
                                            @if (!empty($testimonial['logo']))
                                                <div class="testimonial-box__logo">
                                                    <img src="{{ $testimonial['logo']['url'] }}"
                                                        alt="{{ $testimonial['logo']['alt'] }}">
                                                </div>
                                            @endif

                                            @if (!empty($testimonial['content']))
                                                <div class="testimonial-box__content">
                                                    {!! $testimonial['content'] !!}
                                                </div>
                                            @endif

                                            <div class="testimonial-box-footer">
                                                @if ($testimonial['avatar'])
                                                    <img src="{{ $testimonial['avatar']['url'] }}"
                                                        alt="{{ $testimonial['avatar']['alt'] }}"
                                                        class="testimonial-box-footer__avatar">
                                                @endif

                                                <div class="testimonial-box-footer__author">
                                                    <p class="testimonial-box-footer__author-name">
                                                        {{ $testimonial['name'] }}
                                                    </p>
                                                    <p class="testimonial-box-footer__author-role">
                                                        {{ $testimonial['role'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
