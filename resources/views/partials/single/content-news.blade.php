<article class="single-post single-post--news">
    @if (has_post_thumbnail())
        <header class="single-news-header container">
            {!! get_the_post_thumbnail(null, 'full', ['class' => 'single-news-header__image']) !!}
        </header>
    @endif

    @section('single-post-content')
        <div class="single-news-intro">
            @if (!empty($categories))
                <ul class="badges-list single-news-intro__badges">
                    @foreach ($categories as $category)
                        <li class="badges-list__item">
                            <span class="badge badge--secondary">
                                {{ $category }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif

            <h1 class="single-news-intro__title">
                {{ $title }}
            </h1>

            <div class="single-news-intro__content">
                {!! $introText !!}
            </div>

            <div class="single-news-intro__footer">
                <p class="single-news-intro__footer-date">
                    {!! $readingTime !!}
                </p>

                <p class="single-news-intro__footer-author">
                    {!! $date !!}
                </p>
            </div>
        </div>
    @endsection

    @section('single-post-after-content')
        @if (!empty($avatar))
            <div class="testimonial-box-footer single-post-footer">
                @image($avatar['image'], 'full', ['class' => 'testimonial-box-footer__avatar'])

                <div class="testimonial-box-footer__author">
                    <p class="testimonial-box-footer__author-name">
                        {{ $avatar['name'] }}
                    </p>
                    <p class="testimonial-box-footer__author-role">
                        {{ $avatar['role'] }}
                    </p>
                </div>
            </div>
        @endif
    @endsection

    @include('partials.single.main-content', [
        'archiveLink' => $archiveLink,
        'backToText' => __('Back to Newsroom', 'labplus'),
        'ctaBlock' => $ctaBlock,
    ])
</article>
