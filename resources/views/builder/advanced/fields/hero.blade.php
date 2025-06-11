<section class="hero">
    @if (!empty($field['background']))
        <img src="{{ $field['background']['url'] }}" alt="{{ $field['background']['alt'] }}" class="hero-background">
    @endif
    <div class="container">
        <div class="hero-row">
            <div class="hero-content">
                <h1 class="hero-content__heading">
                    {{ $field['heading'] }}
                </h1>

                <p class="hero-content__text">
                    {{ $field['content'] }}
                </p>

                @if (!empty($field['button']))
                    <a class="hero-content__button btn btn-secondary" href="{{ $field['button']['url'] }}"
                        target="{{ $field['button']['target'] }}">
                        {{ $field['button']['text'] }}
                    </a>
                @endif
            </div>


            @if ($field['type'] === 'image')
                @if (!empty($field['image']))
                    <div class="hero-image">
                        <img src="{{ $field['image']['url'] }}" alt="{{ $field['image']['alt'] }}"
                            class="hero-image__img">

                    </div>
                @endif
            @else
                <div class="hero-video">
                    <video src="{{ $field['video'] }}" autoplay muted loop playsinline
                        class="hero-video__video"></video>
                </div>
            @endif
        </div>

        @if (!empty($field['logos']))
            <div class="hero-logos">
                <p class="hero-logos__title text-subheader">
                    {{ $field['logos']['title'] }}
                </p>

                @if (!empty($field['logos']['items']))
                    <div class="splide logos-carousel">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($field['logos']['items'] as $logo)
                                    <li class="splide__slide hero-logos-item">
                                        <img src="{{ $logo['logo']['url'] }}" alt="{{ $logo['logo']['alt'] }}"
                                            class="hero-logos-item__image">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>
