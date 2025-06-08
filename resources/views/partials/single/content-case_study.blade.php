<article class="single-post">
    <header class="single-post-header">
        <div class="single-post-header-content container">
            <p class="single-post-header__type">
                {{ __('Case study', 'labplus') }}
            </p>

            <h1 class="single-post-header__title">
                {!! $title !!}
            </h1>

            @if (!empty($excerpt))
                <p class="single-post-header__excerpt">
                    {!! $excerpt !!}
                </p>
            @endif

        </div>

        @if (has_post_thumbnail())
            <div class="single-post-header__thumbnail container">
                {!! get_the_post_thumbnail(null, 'full', ['class' => 'single-post-header__thumbnail-image']) !!}
            </div>
        @endif
    </header>

    <div class="container">
        <div class="single-post-row">
            <aside class="single-post-aside">
                @include('components.link-more-icon', [
                    'url' => $archiveLink,
                    'target' => '_blank',
                    'title' => __('Back to case studies', 'labplus'),
                    'class' => 'link-more--reverse',
                ])

                @if (!empty($ctaBlock))
                    <div class="cta-block">
                        <h6 class="cta-block__title">
                            {{ $ctaBlock['title'] }}
                        </h6>

                        <p class="cta-block__content">
                            {{ $ctaBlock['content'] }}
                        </p>

                        @if (!empty($ctaBlock['button']))
                            <a class="btn btn-primary btn-full cta-block__btn" href="{{ $ctaBlock['button']['url'] }}"
                                target="{{ $ctaBlock['button']['target'] }}">
                                {{ $ctaBlock['button']['title'] }}
                            </a>
                        @endif
                    </div>
                @endif
            </aside>

            <div class="single-post-builder">
                @include('builder.single.builder-single')

            </div>
        </div>
    </div>
</article>
