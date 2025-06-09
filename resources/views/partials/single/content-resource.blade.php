<article class="single-post single-post--news">
    @if (has_post_thumbnail())
        <header class="single-news-header container">
            {!! get_the_post_thumbnail(null, 'full', ['class' => 'single-news-header__image']) !!}
        </header>
    @endif

    @section('single-post-content')
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
    @endsection

    @section('single-post-aside-content')
        @if (!empty($downloadLink))
            <div class="single-post-aside__download">
                <a class="btn btn-secondary btn-icon btn-full" href="{{ $downloadLink }}" download>
                    <span class="btn-icon__text">
                        {{ __('Download files', 'labplus') }}
                    </span>

                    {{ get_svg('resources.images.icon.fetch', ['class' => 'btn-icon__img']) }}
                </a>
            </div>
        @endif
    @endsection

    @section('single-post-after-content')
        @if (!empty($downloadLink))
            <div class="single-post-builder__download">
                <a class="btn btn-secondary btn-icon" href="{{ $downloadLink }}" download>
                    <span class="btn-icon__text">
                        {{ __('Download files', 'labplus') }}
                    </span>

                    {{ get_svg('resources.images.icon.fetch', ['class' => 'btn-icon__img']) }}
                </a>
            </div>
        @endif

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
        'backToText' => __('Back to Resources', 'labplus'),
        'ctaBlock' => $ctaBlock,
    ])
</article>
