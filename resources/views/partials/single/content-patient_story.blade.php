<article class="single-post">
    <header class="single-post-header">
        <div class="single-post-header-content container">
            <p class="single-post-header__type">
                {{ __('Patient story', 'labplus') }}
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

    @include('partials.single.main-content', [
        'archiveLink' => $archiveLink,
        'backToText' => __('Back to patient stories', 'labplus'),
        'ctaBlock' => $ctaBlock,
    ])
</article>
