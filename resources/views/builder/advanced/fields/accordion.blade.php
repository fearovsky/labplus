<section class="accordion-section accordion-section--{{ $field['imageSize'] }}">
    <div class="container">
        @if ($field['heading'])
            <div class="section-title">
                <h2 class="section-title__text">
                    {!! $field['heading'] !!}
                </h2>
            </div>
        @endif

        <div class="accordion-section-row">
            @if ($field['image'])
                <div class="accordion-section-image">
                    <img src="{{ $field['image']['url'] }}" alt="{{ $field['image']['alt'] }}"
                        class="accordion-section-image__img" />
                </div>
            @endif

            @if (!empty($field['items']))
                <div class="accordion-section-items">
                    <ul class="accordion-section-list">
                        @foreach ($field['items'] as $key => $item)
                            <li
                                class="accordion-section-list__item{{ $key == 0 ? ' accordion-section-list__item--acitve' : null }}">
                                <h5 class="accordion-section-list__item-title">
                                    <button class="accordion-section-list__item-button">
                                        {{ $item['title'] }}
                                    </button>
                                </h5>

                                <div class="accordion-section-list__item-content">
                                    {!! $item['content'] !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>
