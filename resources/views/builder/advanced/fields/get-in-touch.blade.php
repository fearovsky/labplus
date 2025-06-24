<section class="get-in-touch">
    <div class="container get-in-touch-container">
        <div class="get-in-touch-banner">
            <div class="get-in-touch-content">
                @if ($field['title'])
                    <h2 class="get-in-touch-content__title">
                        {!! $field['title'] !!}
                    </h2>
                @endif

                @if ($field['content'])
                    <div class="get-in-touch-content__text">
                        {!! $field['content'] !!}
                    </div>
                @endif

                @if ($field['button'])
                    <a class="btn btn-secondary get-in-touch-content__btn" href="{{ $field['button']['url'] }}">
                        {{ $field['button']['title'] }}
                    </a>
                @endif
            </div>

            <div class="get-in-touch-additional">
                @if ($field['image'])
                    <div class="get-in-touch-image">
                        <img src="{{ $field['image']['url'] }}" alt="{{ $field['image']['alt'] }}"
                            class="get-in-touch-image__img">
                    </div>
                @endif

                <div class="get-in-touch-imageContent">
                    <h3 class="get-in-touch-imageContent__title h5">
                        {{ $field['titleImage'] }}
                    </h3>

                    <p class="get-in-touch-imageContent__text">
                        {{ $field['contentImage'] }}
                    </p>

                    @if (!empty($field['links']))
                        <ul class="get-in-touch-social social-links">
                            @foreach ($field['links'] as $item)
                                <li class="social-links__item">
                                    <a href="{{ $item['link']['url'] }}" class="social-links__link">
                                        <img src="{{ $item['icon'] }}" class="social-links__link-icon" alt="">

                                        <span class="social-links__link-text">
                                            {{ $item['link']['title'] }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    @endif
                </div>
            </div>

            {{ get_svg('resources.images.icon.plus', ['class' => 'get-in-touch-banner__plus']) }}
        </div>
    </div>
</section>
