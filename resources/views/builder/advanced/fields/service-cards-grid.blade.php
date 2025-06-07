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
                        @if (!empty($item['image']))
                            <div class="service-cards-grid__image">
                                @image($item['image'], 'full', ['class' => 'service-cards-grid__image-thumbnail'])
                            </div>
                        @endif
                        <div class="service-cards-grid__content">
                            @if ($item['preTitle'])
                                <p class="service-cards-grid__content-preheading">
                                    {{ $item['preTitle'] }}
                                </p>
                            @endif
                            <h3 class="service-cards-grid__content-title h4">{{ $item['title'] }}</h3>
                            <p class="service-cards-grid__content-description">{{ $item['content'] }}</p>

                            @if ($item['link'])
                                @include('components.link-more-icon', [
                                    'url' => $item['link']['url'],
                                    'target' => '_self',
                                    'title' => $item['link']['title'],
                                ])
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
