<section class="oportunity-carousel">
    @if (!empty($field['heading']))
        <div class="section-title">
            <h2 class="section-title__text">
                {!! $field['heading'] !!}
            </h2>
        </div>
    @endif

    <div class="oportunity-carousel-row">
        @if ($field['image'])
            <div class="oportunity-carousel-image">
                <img src="{{ $field['image']['url'] }}" alt="{{ $field['image']['alt'] }}"
                    class="oportunity-carousel-image__thumbnail">

                {{ get_svg('resources.images.icon.plus', ['class' => 'oportunity-carousel-image__thumbnail-icon']) }}

            </div>
        @endif

        <div class="oportunity-carousel-slider">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($field['items'] as $field)
                            <li class="splide__slide">
                                <div class="box-shadow oportunity-carousel-slider__item">
                                    <img src="{{ $field['icon'] }}" alt="{{ $field['title'] }}"
                                        class="oportunity-carousel-slider__item-image">

                                    <h4 class="oportunity-carousel-slider__item-title">
                                        {{ $field['title'] }}
                                    </h4>

                                    <p class="oportunity-carousel-slider__item-content">
                                        {!! $field['content'] !!}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


</section>
