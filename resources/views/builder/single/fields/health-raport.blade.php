<section class="health-raport">
    @if (!empty($field['heading']))
        <h2 class="health-raport__heading">
            {!! $field['heading'] !!}
        </h2>
    @endif

    <div class="health-raport-banner">
        @image($field['thumbnail'], 'large', ['class' => 'health-raport-banner__thumbnail'])

        <div class="health-raport-banner__content">
            <p class="health-raport-banner__content-title h6">
                {{ __('View the interpreted lab test results', 'labplus') }}
            </p>

            <p class="health-raport-banner__content-description">
                {{ __('Opens on modal (pdf/jpg).', 'labplus') }}
            </p>

            @if (!empty($healthRaport))
                <div class="health-raport-banner__content-download">
                    <button role="button" data-modal="healthRaport" class="btn btn-secondary btn-icon btn--small">
                        <span class="btn-icon__text">
                            {{ __('Open the Health Report', 'labplus') }}
                        </span>

                        {{ get_svg('resources.images.icon.directory', ['class' => 'btn-icon__img']) }}
                    </button>
                </div>
            @endif
        </div>
    </div>
</section>
