@if (!empty($ctaBlock))
    <div class="cta-block">
        <h6 class="cta-block__title">
            {{ $ctaBlock['title'] }}
        </h6>

        <p class="cta-block__content">
            {{ $ctaBlock['content'] }}
        </p>

        @if (!empty($ctaBlock['button']))
            <a class="btn btn-primary btn-full cta-block__btn" href="{{ $ctaBlock['button']['url'] }}"
                target="{{ $ctaBlock['button']['target'] }}">
                {{ $ctaBlock['button']['title'] }}
            </a>
        @endif
    </div>
@endif
