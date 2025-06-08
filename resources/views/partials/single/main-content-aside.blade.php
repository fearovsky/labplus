<aside class="single-post-aside">
    @include('components.link-more-icon', [
        'url' => $archiveLink,
        'target' => '_blank',
        'title' => $backToText,
        'class' => 'link-more--reverse',
    ])

    @include('components.cta-block', [
        'ctaBlock' => $ctaBlock,
    ])
</aside>
