<section class="case-study-testimonial splide">
    @if ($field['heading'])
        <div class="section-title">
            <h2 class="section-title__text">
                {{ $field['heading'] }}
            </h2>
        </div>
    @endif



    @if (!empty($field['items']))
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($field['items'] as $item)
                    <li class="splide__slide">
                        <div class="case-study-item">
                            <div class="case-study-item-content">
                                {!! $item['thumbnail'] !!}

                                <p class="case-study-item-content__name">
                                    {{ __('Case study', 'labplus') }}
                                </p>

                                <h3 class="case-study-item-content__title h5">
                                    {{ $item['title'] }}
                                </h3>

                                <p class="case-study-item-content__text">
                                    {{ $item['excerpt'] }}
                                </p>

                                @include('components.link-more-icon', [
                                    'url' => $item['permalink'],
                                    'target' => '_blank',
                                    'title' => __('Read case study', 'labplus'),
                                ])
                            </div>

                            <div class="case-study-item-testimonial">
                                @if ($item['testimonial']['logo'])
                                    <img src="{{ $item['testimonial']['logo']['url'] }}"
                                        alt="{{ $item['testimonial']['logo']['alt'] }}"
                                        class="case-study-item-testimonial__logo">
                                @endif

                                <div class="case-study-item-testimonial__content">
                                    {!! $item['testimonial']['content'] !!}
                                </div>

                                <div class="testimonial-box-footer case-study-item-testimonial__footer">
                                    @if ($item['testimonial']['avatar'])
                                        <img src="{{ $item['testimonial']['avatar']['url'] }}"
                                            alt="{{ $item['testimonial']['avatar']['alt'] }}"
                                            class="testimonial-box-footer__avatar">
                                    @endif

                                    <div class="testimonial-box-footer__author">
                                        <p class="testimonial-box-footer__author-name">
                                            {{ $item['testimonial']['name'] }}</p>
                                        <p class="testimonial-box-footer__author-role">
                                            {{ $item['testimonial']['role'] }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    @endif
</section>
