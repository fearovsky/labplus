<section class="rules-tab">
    <div class="container">
        @if (!empty($field['heading']))
            <div class="section-title">
                <h1 class="section-title__text">
                    {!! $field['heading'] !!}
                </h1>

                <div class="section-title__header">
                    {!! $field['contentBeforeTabs'] !!}
                </div>
            </div>
        @endif

        @if (!empty($field['tabs']))
            <ul class="rules-tab-tabs badges-list">
                @foreach ($field['tabs'] as $index => $tab)
                    <li class="rules-tab-tabs__item badges-list__item{{ $index === 0 ? ' badges-list__item--active' : null }}"
                        data-section="{{ sanitize_title($tab['tab']) }}">
                        <button class="badge" type="button">
                            {{ $tab['tab'] }}
                        </button>
                    </li>
                @endforeach
            </ul>


            <div class="rules-tab-sections">
                @foreach ($field['tabs'] as $index => $tab)
                    <div class="rules-tab-section{{ $index === 0 ? ' rules-tab-section--active' : null }}"
                        data-section="{{ sanitize_title($tab['tab']) }}">
                        @if (!empty($tab['rows']))
                            <div class="rules-tab-section__items">
                                @foreach ($tab['rows'] as $row)
                                    <div class="rules-tab-section__item rules-tab-section__item--{{ $row['type'] }}">
                                        @if ($row['type'] === 'content')
                                            <div class="rules-tab-section__content">
                                                {!! $row['content'] !!}
                                            </div>

                                            @if ($row['badges'])
                                                <ul class="rules-tab-section__badges badges-list">
                                                    @foreach ($row['badges'] as $badge)
                                                        <li class="rules-tab-section__badge badges-list__item">
                                                            <span class="badge">
                                                                {{ $badge['item'] }}
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @elseif (!empty($row['downloadsFile']))
                                            <ul class="download-list">
                                                @foreach ($row['downloadsFile'] as $downloadItem)
                                                    <li class="download-list__item">
                                                        <a href="{{ $downloadItem['file'] }}"
                                                            class="download-list__link" download>
                                                            <span class="download-list__text h6">
                                                                {{ $downloadItem['fileName'] }}
                                                            </span>

                                                            <span class="btn btn-secondary btn-icon btn--small">
                                                                <span class="btn-icon__text">
                                                                    {{ __('Download', 'labplus') }}
                                                                </span>

                                                                {{ get_svg('resources.images.icon.fetch', ['class' => 'btn-icon__img']) }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

        @endif

    </div>
</section>
