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
                    <ul class="faq-section-items__list faq-section-list">
                        @foreach ($field['items'] as $item)
                            <li class="faq-section-list__item">
                                <h4 class="faq-section-list__heading h6">
                                    <button class="faq-section-list__heading-button" type="button">
                                        {{ $item['question'] }}

                                        <span class="faq-section-list__heading-icon">
                                        </span>
                                    </button>
                                </h4>

                                <div class="faq-section-list__item-content">
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
