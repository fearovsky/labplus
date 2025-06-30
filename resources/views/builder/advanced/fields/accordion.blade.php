<section class="accordion-section accordion-section--{{ $field['imageSize'] }}">
    <div class="container">
        @if (!empty($field['heading']))
            <div class="section-title">
                <h2 class="section-title__text">
                    {!! $field['heading'] !!}
                </h2>
            </div>
        @endif

        <div class="accordion-section-row">
            @if ($field['video'])
                <div class="accordion-section-image">
                    {{-- Video inline --}}
                    <video class="accordion-section-image__video" src="{{ $field['video'] }}#t=0.001" autoplay muted loop
                        preload="metadata">
                    </video>
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
