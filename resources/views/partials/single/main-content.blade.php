<div class="container container--medium">
    <div class="single-post-row">
        @include('partials.single.main-content-aside', [
            'archiveLink' => $archiveLink,
            'backToText' => $backToText,
        ])

        <div class="single-post-builder">
            @yield('single-post-content')
            @include('builder.single.builder-single')
            @yield('single-post-after-content')
        </div>
    </div>
</div>

@if (!empty($posts))
    @include('builder.advanced.fields.testimonials-carousel-posts', [
        'field' => [
            'posts' => $posts,
            'resourceName' => $mappedResources,
            'resourceLinkText' => $resourceLinkText,
            'heading' => __('See more posts in Labplus Newsroom', 'labplus'),
            'link' => [
                'title' => __('View all posts', 'labplus'),
                'url' => $archiveLink,
                'target' => '_self',
            ],
        ],
    ])
@endif
