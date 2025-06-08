<section class="single-summary">
    <h2 class="h3 single-summary__title">
        {!! $field['title'] !!}
    </h2>

    <div class="single-summary__content">
        {!! $field['content'] !!}
    </div>

    @if (!empty($field['boxes']))
        <div class="single-summary-boxes">
            @if (!empty($field['boxesTitle']))
                <h4 class="single-summary-boxes__title">
                    {!! $field['boxesTitle'] !!}
                </h4>
            @endif

            <ul class="single-summary-boxes__list">
                @foreach ($field['boxes'] as $box)
                    <li class="single-summary-boxes__item">
                        <img src="{{ $box['icon'] }}" class="single-summary-boxes__item-icon">

                        <h6 class="single-summary-boxes__item-title">
                            {!! $box['title'] !!}
                        </h6>

                        <p class="single-summary-boxes__item-content">
                            {!! $box['content'] !!}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

</section>
