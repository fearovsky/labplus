<section
    class="hero-section-image hero-section-image--smallp{{ !empty($hero['patientBoxes']) ? ' hero-section-image--hasBoxes' : null }}">
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

            @if (!empty($hero['video']))
                <div class="hero-section-image-thumbnail hero-section-image-thumbnail--video">
                    {!! $hero['video'] !!}
                </div>
            @endif

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

            @if (!empty($hero['post']))
                <div class="hero-section-image-post">
                    <div class="hero-section-image-post-box">
                        @if ($hero['post']['thumbnail'])
                            <div class="hero-section-image-post-box__thumbnail">
                                {!! $hero['post']['thumbnail'] !!}
                            </div>
                        @endif

                        <div class="hero-section-image-post-box__content">
                            @if (!empty($hero['post']['categories']))
                                <ul class="badges-list hero-section-image-post-box__badges">
                                    @foreach ($hero['post']['categories'] as $category)
                                        <li class="badges-list__item">
                                            <span class="badge badge--secondary">
                                                {{ $category['name'] }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <h2 class="hero-section-image-post-box__content-title h6">
                                {{ $hero['post']['title'] }}
                            </h2>

                            @if (!empty($hero['post']['excerpt']))
                                <p class="hero-section-image-post-box__content-excerpt">
                                    {!! $hero['post']['excerpt'] !!}
                                </p>
                            @endif

                            @if (!empty($hero['post']['permalink']))
                                <div class="hero-section-image-post-buttons">
                                    @include('components.link-more-icon', [
                                        'url' => $hero['post']['permalink'],
                                        'target' => '_self',
                                        'title' => $hero['post']['readMore'],
                                    ])

                                    @if (!empty($hero['fileToDownload']['url']))
                                        @include('components.link-more-icon', [
                                            'url' => $hero['fileToDownload']['url'],
                                            'target' => '_blank',
                                            'title' => __('Download', 'labplus'),
                                            'icon' => 'fetch',
                                            'download' => true,
                                        ])
                                    @endif

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @if (!empty($hero['boxes']))
            <div class="hero-section-image-boxes">
                <ul class="grid-boxes-list grid-boxes-list--white">
                    @foreach ($hero['boxes'] as $box)
                        <li class="grid-boxes-list__item">
                            <p class="grid-boxes-list__item-title h2">
                                {{ $box['title'] }}
                            </p>

                            <p class="grid-boxes-list__item-content">
                                {!! $box['content'] !!}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>
