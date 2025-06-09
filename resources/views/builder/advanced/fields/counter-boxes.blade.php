@if (!empty($field['boxes']))
    <section class="counter-boxes">
        <div class="container">
            @if (!empty($field['heading']))
                <div class="section-title">
                    <h2 class="section-title__text">
                        {!! $field['heading'] !!}
                    </h2>
                </div>
            @endif

            <ul class="counter-boxes-grid">
                @foreach ($field['boxes'] as $item)
                    <li class="counter-boxes-grid__item">
                        <h4 class="counter-boxes-grid__title h6">
                            {!! $item['title'] !!}
                        </h4>

                        <p class="counter-boxes-grid__content">
                            {!! $item['content'] !!}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
