<section class="testimonial">
    <div class="container testimonial-container">
        <div class="testimonial-box">
            @if ($field['logo'])
                <img src="{{ $field['logo']['url'] }}" alt="{{ $field['logo']['alt'] }}" class="testimonial-box__logo">
            @endif

            <div class="testimonial-box__content">
                {!! $field['content'] !!}
            </div>

            <div class="testimonial-box-footer">
                @if ($field['avatar'])
                    <img src="{{ $field['avatar']['url'] }}" alt="{{ $field['avatar']['alt'] }}"
                        class="testimonial-box-footer__avatar">
                @endif

                <div class="testimonial-box-footer__author">
                    <p class="testimonial-box-footer__author-name">{{ $field['name'] }}</p>
                    <p class="testimonial-box-footer__author-role">{{ $field['role'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
