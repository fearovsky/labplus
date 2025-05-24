@if (!empty($item['title']))
    <div class="projects-row projects-row--alt">
        <div class="projects-left">
            <p class="projects-subtitle text-subheader alignleft">
                {!! $item['title'] !!}
            </p>

            @if (!empty($item['link']))
                <div class="projects-left__link">
                    <a href="{{ $item['link']['url'] }}" target="{{ $item['link']['target'] }}" class="btn btn-primary">
                        {{ $item['link']['title'] }}
                    </a>
                </div>
            @endif
        </div>


        <div class="projects-right">
            <p class="projects-subtitle text-subheader alignleft">
                {!! $item['secondTitle'] !!}
            </p>

            <div class="projects-right__content">
                {!! $item['content'] !!}
            </div>
        </div>
    </div>
@endif
