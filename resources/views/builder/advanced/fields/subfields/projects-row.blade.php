@if (!empty($item['title']))
    <div class="projects-row">
        <div class="projects-left">
            <h2 class="projects-left__title">
                {!! $item['title'] !!}
            </h2>

            <div class="projects-left__content">
                {!! $item['content'] !!}
            </div>
        </div>


        <div class="projects-right">
            <img src="{{ $item['logo']['url'] }}" alt="{{ $item['logo']['alt'] }}" class="projects-right__logo">

            @if (!empty($item['boxes']))
                <ul class="boxes-small-list projects-right__boxes">
                    @foreach ($item['boxes'] as $box)
                        <li class="boxes-small-list__item">
                            <div class="boxes-small-list__item-content">
                                <p class="boxes-small-list__item-title h3">
                                    {!! $box['title'] !!}
                                </p>
                                <p class="boxes-small-list__item-text">
                                    {!! $box['content'] !!}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endif
