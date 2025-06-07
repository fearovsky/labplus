<section class="grid-boxes">
    <div class="container">
        @if ($field['heading'])
            <div class="section-title aligncenter">
                <h2 class="section-title__text">
                    {!! $field['heading'] !!}
                </h2>
            </div>
        @endif

        @if (!empty($field['boxes']))
            <ul class="grid-boxes-list">
                @foreach ($field['boxes'] as $box)
                    <li class="grid-boxes-list__item">
                        <p class="grid-boxes-list__item-title h2">
                            {{ $box['title'] }}
                        </p>

                        <p class="grid-boxes-list__item-content">
                            {!! $box['content'] !!}
                        </p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
