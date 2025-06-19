<div class="our-team-box">
    <div class="our-team-box__header">
        <h4 class="our-team-box__name">
            {{ $name }}

            <button class="our-team-box__name-exit">
                {{ __('Close', 'labplus') }}
            </button>
        </h4>

        @if (!empty($role))
            <p class="our-team-box__role">
                {{ $role }}
            </p>
        @endif

        @if (!empty($achievements))
            <div class="our-team-box__achievements">
                {!! $achievements !!}
            </div>
        @endif

        @if (!empty($socialmedia))
            <ul class="our-team-box__social social-links">
                @foreach ($socialmedia as $item)
                    <li class="social-links__item">
                        <a href="{{ $item['link']['url'] }}" class="social-links__link">
                            <img src="{{ $item['icon'] }}" class="social-links__link-icon" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="our-team-box__content">
        {!! $content !!}
    </div>
</div>
