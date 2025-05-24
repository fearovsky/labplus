<section class="hero-image">
    <div class="container hero-image-container">
        <div class="hero-image-row">
            <div class="hero-image-content">
                @if ($field['heading'])
                    <h1 class="hero-image-content__heading">
                        {!! $field['heading'] !!}
                    </h1>
                @endif

                @if ($field['content'])
                    <div class="hero-image-content__text">
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
                <div class="hero-image-thumbnail">
                    <img src="{{ $field['image']['url'] }}" alt="{{ $field['image']['alt'] }}"
                        class="hero-image-thumbnail__image">
                </div>
            @endif
        </div>
    </div>
</section>
