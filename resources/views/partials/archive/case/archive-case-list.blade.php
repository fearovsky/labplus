<ul class="archive-posts" data-paged="{{ $paged }}" data-maxpages="{{ $maxPages }}">
    @foreach ($items as $item)
        @include('partials.archive.case.archive-case-item', [
            'item' => $item,
        ])
    @endforeach
</ul>
