<section class="hero-section-image">
    <div class="container hero-section-image-container">
        <div class="hero-section-image-row">
            <div class="hero-section-image-content">
                @if ($field['heading'])
                    <h1 class="hero-section-image-content__heading">
                        {!! $field['heading'] !!}
                    </h1>
                @endif

                @if ($field['content'])
                    <div class="hero-section-image-content__text">
                        {!! $field['content'] !!}
                    </div>
                @endif

                @if ($field['button'])
                    <a class="btn btn-secondary" href="{{ $field['button']['url'] }}"
                        target="{{ $field['button']['target'] }}">
                        {{ $field['button']['title'] }}
                    </a>
                @endif
            </div>

            @if ($field['image'])
                <div class="hero-section-image-thumbnail">
                    <img src="{{ $field['image']['url'] }}" alt="{{ $field['image']['alt'] }}"
                        class="hero-section-image-thumbnail__image">
                </div>
            @endif
        </div>
    </div>
</section>
