@if (!empty($pagination))
    <ul class="pagination">
        @foreach ($pagination as $item)
            <li class="pagination__item">
                {!! $item !!}
            </li>
        @endforeach
    </ul>
@endif
