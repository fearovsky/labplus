<ul class="archive-posts">
    @foreach ($items as $item)
        <li class="archive-posts-item">
            <a class="archive-posts-item__header" href="{{ $item['link'] }}">
                {!! $item['thumbnail'] !!}
            </a>

            <div class="archive-posts-item__box">
                <h3 class="archive-posts-item__title h6">
                    <a href="{{ $item['link'] }}" class="archive-posts-item__title-link">
                        {{ $item['title'] }}
                    </a>
                </h3>

                <p class="archive-posts-item__content">
                    {!! $item['excerpt'] !!}
                </p>

                @include('components.link-more-icon', [
                    'url' => $item['permalink'],
                    'target' => '_self',
                    'title' => __('Read case study', 'labplus'),
                ])
            </div>
        </li>
    @endforeach
</ul>
