<section class="latest-resources">
    <div class="container">
        <div class="box-shadow-white">
            @if (!empty($field['heading']))
                <div class="section-title">
                    <h2 class="section-title__text">
                        {!! $field['heading'] !!}
                    </h2>
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
                                <p class="boxes-grid-item__content-category">
                                    {{ $item['resourceName'] ?: __('Labplus solutions', 'labplus') }}
                                </p>

                                <h4 class="boxes-grid-item__content-title">
                                    {!! $item['title'] !!}
                                </h4>

                                @include('components.link-more-icon', [
                                    'url' => $item['permalink'],
                                    'target' => '_self',
                                    'title' => __('Read post', 'labplus'),
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
</section>
