<section class="text-icon-grid">
    <div class="container">
        @if ($field['heading'])
            <div class="section-title">
                <h2 class="section-title__text">
                    {!! $field['heading'] !!}
                </h2>
            </div>
        @endif

        @if ($field['items'])
            <ul class="text-icon-grid-list">
                @foreach ($field['items'] as $item)
                    <li class="text-icon-grid-list__item">
                        @if ($item['icon'])
                            <img src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] }}"
                                class="text-icon-grid-list__item-icon">
                        @endif

                        <div class="text-icon-grid-list__item-content">
                            <h3 class="text-icon-grid-list__item-title h6">
                                {{ $item['title'] }}
                            </h3>

                            <div class="text-icon-grid-list__item-text">
                                {!! $item['content'] !!}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    </div>
</section>
