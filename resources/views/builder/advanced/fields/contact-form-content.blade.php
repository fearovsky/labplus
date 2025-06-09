<div class="contact-form-content">
    <div class="container">
        <div class="contact-form-content-row">
            <div class="contact-form-content-content">
                @if (!empty($field['heading']))
                    <h2 class="contact-form-content-content__title">
                        {{ $field['heading'] }}
                    </h2>
                @endif

                @if ($field['content'])
                    <div class="contact-form-content-content__text">
                        {!! $field['content'] !!}
                    </div>
                @endif

                @if ($field['contactPerson'])
                    <div class="contact-form-content-content__person">
                        @include('components.contact-person', [
                            'contactPerson' => $field['contactPerson'],
                        ])
                    </div>
                @endif
            </div>

            @if (!empty($field['formShortcode']))
                <div class="contact-form-content-form box-green">
                    @php
                        echo do_shortcode($field['formShortcode']);
                    @endphp
                </div>
            @endif
        </div>
    </div>

    @if (!empty($field['submissionRedirect']))
        @include('builder.advanced.fields.subfields.form-redirect-script', [
            'submissionRedirect' => $field['submissionRedirect'],
        ])
    @endif
</div>
