@if (!empty($field['boardSections']))
    <section class="chess-board section">
        <div class="container">
            <div class="section-title">
                <h2 class="section-title__text">
                    {!! $field['heading'] !!}
                </h2>
            </div>

            <div class="chess-board-list">
                @foreach ($field['boardSections'] as $section)
                    <div class="chess-board-item chess-board-item--{{ $section['imagePosition'] }}">
                        <div class="chess-board-item__content">
                            @if (!empty($section['pretitle']))
                                <p class="chess-board-item__pretitle text-subheader alignleft">
                                    {{ $section['pretitle'] }}
                                </p>
                            @endif

                            <h2 class="chess-board-item__title">
                                {{ $section['title'] }}
                            </h2>

                            <div class="chess-board-item__text">
                                {!! $section['content'] !!}
                            </div>

                            @if (!empty($section['summary']))
                                <p class="chess-board-item__summary">
                                    <strong class="chess-board-item__summary-name">
                                        {{ $section['summary']['number'] }}
                                    </strong>

                                    <span class="chess-board-item__summary-text">
                                        {{ $section['summary']['content'] }}
                                    </span>
                                </p>
                            @endif

                            @if (!empty($section['link']))
                                <a class="chess-board-item__button btn btn-icon btn-primary"
                                    href="{{ $section['link']['url'] }}" target="{{ $section['link']['target'] }}">
                                    <span class="btn-icon__text">
                                        {{ $section['link']['title'] }}
                                    </span>

                                    {{ get_svg('resources.images.icon.arrow-left', ['class' => 'btn-icon__img']) }}
                                </a>
                            @endif
                        </div>

                        <div class="chess-board-item__thumbnail">
                            <img src="{{ $section['image']['url'] }}" alt="{{ $section['image']['alt'] }}"
                                class="chess-board-item__thumbnail-img" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
