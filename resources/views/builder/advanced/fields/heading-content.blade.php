<section class="heading-content">
    <div class="container container--{{ $field['containerSize'] }}">
        @if ($field['heading'])
            <div class="section-title">
                <h2 class="section-title__text">
                    {!! $field['heading'] !!}
                </h2>
            </div>
        @endif

        <div class="heading-content__text">
            {!! $field['content'] !!}
        </div>
    </div>
</section>
