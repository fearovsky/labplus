<aside class="single-post-aside">
    @include('components.link-more-icon', [
        'url' => $archiveLink,
        'target' => '_self',
        'title' => $backToText,
        'class' => 'link-more--reverse single-post-aside__back',
    ])

    <div class="single-post-toc"></div>

    @yield ('single-post-aside-content')

    @include('components.cta-block', [
        'ctaBlock' => $ctaBlock,
    ])
</aside>
