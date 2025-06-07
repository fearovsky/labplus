<section class="service-cards-grid">
    <div class="container">
        @if ($field['heading'])
            <div class="section-title">
                <h2 class="section-title__text">
                    {!! $field['heading'] !!}
                </h2>
            </div>
        @endif

        @if (!empty($field['items']))
            <ul class="service-cards-grid__list">
                @foreach ($field['items'] as $item)
                    <li class="service-cards-grid__item">
                        <div class="service-card">
                            @if (!empty($item['image']))
                                <div class="service-card__image">
                                    @image($item['image'], 'full', ['class' => 'service-card__image-thumbnail'])
                                </div>
                            @endif
                            <div class="service-card__content">
                                <h3 class="service-card__title">{{ $item['title'] }}</h3>
                                <p class="service-card__description">{{ $item['content'] }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
