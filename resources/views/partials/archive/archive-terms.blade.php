<ul class="archive-terms__list" data-taxonomy="{{ $taxonomy }}">
    @foreach ($terms as $term)
        <li class="archive-terms__item{{ $term['active'] ? ' archive-terms__item--active' : null }}">
            <button class="archive-terms__button badge" type="button" data-term="{{ $term['id'] }}">
                {{ $term['name'] }}
            </button>
        </li>
    @endforeach
</ul>
