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
                                    <div class="rules-tab-section__item">
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
