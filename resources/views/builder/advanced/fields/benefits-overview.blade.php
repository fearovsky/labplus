<section class="benefits-overview">
    <div class="container">
        <div class="benefits-overview-row">
            <div class="benefits-overview-content">
                @if ($field['preheading'])
                    <p class="benefits-overview-content__subheading text-subheader alignleft">
                        {{ $field['preheading'] }}
                    </p>
                @endif

                @if ($field['heading'])
                    <h2 class="benefits-overview-content__heading">
                        {!! $field['heading'] !!}
                    </h2>
                @endif

                @if ($field['content'])
                    <div class="benefits-overview-content__text">
                        {!! $field['content'] !!}
                    </div>
                @endif

                @if (!empty($field['link']))
                    <a class="btn btn-primary benefits-overview-content__btn" href="{{ $field['link']['url'] }}"
                        target="{{ $field['link']['target'] }}">
                        {{ $field['link']['title'] }}
                    </a>
                @endif
            </div>

            @if (!empty($field['boxes']))
                <div class="benefits-overview-boxes">
                    <ul class="benefits-overview-boxes__list">
                        @foreach ($field['boxes'] as $box)
                            <li class="benefits-overview-boxes__item">
                                <div class="benefits-overview-boxes__header">
                                    @if ($box['icon'])
                                        <img class="benefits-overview-boxes__header-icon"
                                            src="{{ $box['icon']['url'] }}" alt="{{ $box['icon']['alt'] }}">
                                    @endif

                                    <h4 class="benefits-overview-boxes__header-title h5">
                                        {{ $box['title'] }}
                                    </h4>
                                </div>

                                @if ($box['content'])
                                    <div class="benefits-overview-boxes__text">
                                        {!! $box['content'] !!}
                                    </div>
                                @endif

                                @if (!empty($box['link']))
                                    <div class="benefits-overview-boxes__btn">
                                        @include('components.link-more-icon', [
                                            'url' => $box['link']['url'],
                                            'target' => $box['link']['target'],
                                            'title' => $box['link']['title'],
                                        ])
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</section>
