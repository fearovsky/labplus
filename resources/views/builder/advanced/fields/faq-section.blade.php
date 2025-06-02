<section class="faq-section">
    <div class="container">
        <div class="faq-section-row">
            <div class="faq-section-content">
                @if ($field['heading'])
                    <h2 class="faq-section-content__heading">
                        {!! $field['heading'] !!}
                    </h2>
                @endif

                @if ($field['content'])
                    <div class="faq-section-content__content">
                        {!! $field['content'] !!}
                    </div>
                @endif
            </div>

            <div class="faq-section-items">
                @if (!empty($field['items']))
                    <ul class="faq-section-items__list faq-list">
                        @foreach ($field['items'] as $item)
                            <li class="faq-list__item">
                                <h4 class="faq-list__item__heading">
                                    <button class="faq-list__item__heading__button" type="button">
                                        {{ $item['question'] }}
                                    </button>
                                </h4>

                                <div class="faq-list__item__content">
                                    {!! $item['answer'] !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>
