<li class="archive-posts-item">
    <a class="archive-posts-item__header" href="{{ $item['permalink'] }}">
        {!! $item['thumbnail'] !!}
    </a>

    <div class="archive-posts-item__box">
        @if (!empty($item['categories']))
            <ul class="badges-list hero-section-image-post-box__badges">
                @foreach ($item['categories'] as $category)
                    <li class="badges-list__item">
                        <span class="badge badge--secondary">
                            {{ $category['name'] }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif

        @if (!empty($item['logo']))
            <img class="archive-posts-item__logo" src="{{ $item['logo']['url'] }}" alt="{{ $item['logo']['alt'] }}" />
        @endif

        <h3 class="archive-posts-item__title h6">
            <a href="{{ $item['permalink'] }}" class="archive-posts-item__title-link">
                {!! $item['title'] !!}
            </a>
        </h3>

        <p class="archive-posts-item__content">
            {!! $item['excerpt'] !!}
        </p>

        @include('components.link-more-icon', [
            'url' => $item['permalink'],
            'target' => '_self',
            'title' => $item['readMoreText'] ?? __('Read more', 'labplus'),
        ])
    </div>
</li>
