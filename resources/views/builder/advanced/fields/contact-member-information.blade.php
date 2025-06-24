<section class="contact-member-information">
    <div class="container container--small">
        <div class="box-white-small">
            <div class="contact-member-information-row">
                @if ($field['member']['avatar'])
                    <div class="contact-member-information__avatar">
                        <img src="{{ $field['member']['avatar']['url'] }}" alt="{{ $field['member']['avatar']['alt'] }}"
                            class="contact-member-information__avatar-image">
                    </div>
                @endif

                <div class="contact-member-information-row__content">
                    <h4 class="contact-member-information-row__content-title large">
                        {!! $field['title'] !!}
                    </h4>

                    <div class="contact-member-information-row__content__area">
                        <p class="contact-member-information-row__content__area-name">
                            {{ $field['member']['name'] }}
                        </p>

                        @if (!empty($field['member']['email']))
                            <a class="contact-member-information-row__content__area-email"
                                href="mailto:{{ $field['member']['email'] }}">
                                {{ $field['member']['email'] }}
                            </a>
                        @endif

                        @if (!empty($field['member']['phone']))
                            <p class="contact-member-information-row__content__area-phone">
                                {{ $field['member']['phone'] }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>


            {{ get_svg('resources.images.icon.plus', ['class' => 'box-white-small__plus']) }}
        </div>
    </div>
</section>
