<section class="testimonials-carousel-posts">
    <div class="container">
        <div class="box-shadow-white">
            @if ($field['heading'])
                <div class="section-title">
                    <h2 class="section-title__text">
                        {!! $field['heading'] !!}
                    </h2>
                </div>
            @endif

            @if (!empty($field['testimonials']))
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($field['testimonials'] as $item)
                                <li class="splide__slide">
                                    <div class="box-green-light testimonials-carousel-posts__item">
                                        <div class="testimonials-carousel-posts__content">
                                            {!! $item['content'] !!}
                                        </div>

                                        <div class="testimonial-box-footer case-study-item-testimonial__footer">
                                            @if ($item['avatar'])
                                                <img src="{{ $item['avatar']['url'] }}"
                                                    alt="{{ $item['avatar']['alt'] }}"
                                                    class="testimonial-box-footer__avatar">
                                            @endif

                                            <div
                                                class="testimonial-box-footer__author testimonial-box-footer__author--thin">
                                                <p class="testimonial-box-footer__author-name">
                                                    {{ $item['name'] }}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (!empty($field['posts']))
                <ul class="boxes-grid">
                    @foreach ($field['posts'] as $item)
                        <li class="boxes-grid-item">
                            @if ($item['thumbnail'])
                                <div class="boxes-grid-item__image">
                                    {!! $item['thumbnail'] !!}
                                </div>
                            @endif

                            <div class="boxes-grid-item__content">
                                @if ($field['resourceName'])
                                    <p class="boxes-grid-item__content-category">
                                        {{ $field['resourceName'] }}
                                    </p>
                                @endif

                                <h4 class="boxes-grid-item__content-title">
                                    {!! $item['title'] !!}
                                </h4>

                                @include('components.link-more-icon', [
                                    'url' => $item['permalink'],
                                    'target' => '_self',
                                    'title' => $field['resourceLinkText'],
                                ])

                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if (!empty($field['link']))
                <div class="center-content spacing-4">
                    <a class="btn btn-primary" href="{{ $field['link']['url'] }}"
                        target="{{ $field['link']['target'] }}">
                        {{ $field['link']['title'] }}
                    </a>
                </div>
            @endif

        </div>
    </div>
</section>
