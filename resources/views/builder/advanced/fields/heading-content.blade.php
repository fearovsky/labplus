<section class="heading-content">
    <div class="container container--{{ $field['containerSize'] }}">
        @if ($field['heading'])
            <div class="section-title">
                <h2 class="section-title__text">
                    {!! $field['heading'] !!}
                </h2>
            </div>
        @endif

        @if (!empty($field['information']['title']))
            <div class="information-box heading-content-box">
                <div class="information-box-content">
                    <h5 class="information-box-content__title text-subheader alignleft">
                        {!! $field['information']['title'] !!}
                    </h5>

                    <p class="information-box-content__text">
                        {!! $field['information']['content'] !!}
                    </p>

                    @if ($field['information']['explanation'])
                        <p class="information-box-content__explanation">
                            {{ get_svg('resources.images.icon.info', ['class' => 'information-box-content__explanation-icon']) }}
                            <span class="information-box-content__explanation-text">
                                {{ $field['information']['explanation'] }}
                            </span>
                        </p>
                    @endif
                </div>

                @if ($field['information']['link'])
                    <div class="information-box-button">
                        <a href="{{ $field['information']['link']['url'] }}" class="btn btn-primary btn--small">
                            {{ $field['information']['link']['title'] }}
                        </a>
                    </div>
                @endif
            </div>
        @endif

        @if ($field['content'])
            <div class="heading-content__text">
                {!! $field['content'] !!}
            </div>
        @endif
    </div>
</section>
