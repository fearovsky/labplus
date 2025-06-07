<section class="hero-section-image hero-section-image--video">
    <div class="container hero-section-image-container">
        <div class="hero-section-image-row">
            <div class="hero-section-image-content">
                @if ($field['preheading'])
                    <p class="hero-section-image-content__preheading">
                        {!! $field['preheading'] !!}
                    </p>
                @endif

                @if ($field['heading'])
                    <h1 class="hero-section-image-content__heading">
                        {!! $field['heading'] !!}
                    </h1>
                @endif

                @if ($field['button'])
                    <a class="btn btn-secondary" href="{{ $field['button']['url'] }}"
                        target="{{ $field['button']['target'] }}">
                        {{ $field['button']['title'] }}
                    </a>
                @endif
            </div>

            @if ($field['video'])
                <div class="hero-section-image-thumbnail hero-section-image-thumbnail--video">
                    {!! $field['video'] !!}
                </div>
            @endif
        </div>
    </div>
</section>
