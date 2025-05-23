<section class="hero-with-background">
    <img src="{{ $field['background']['url'] }}" alt="{{ $field['background']['alt'] }}"
        class="hero-with-background__image">

    <div class="hero-with-background-content container">
        @if (!empty($field['icon']))
            <img src="{{ $field['icon']['url'] }}" alt="{{ $field['icon']['alt'] }}"
                class="hero-with-background-content__icon">
        @endif

        <h1 class="hero-with-background-content__title">
            {!! $field['heading'] !!}
        </h1>

        <p class="hero-with-background-content__description">
            {!! $field['content'] !!}
        </p>

        @if (!empty($field['button']))
            <a class="btn btn-primary btn--small btn-icon" href="{{ $field['button']['url'] }}">
                <span class="btn-icon__text">
                    {{ $field['button']['title'] }}
                </span>

                {{ get_svg('resources.images.icon.house', ['class' => 'btn-icon__img']) }}
            </a>
        @endif
    </div>
</section>
