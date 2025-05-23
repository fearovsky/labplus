<div class="contact-person">
    <div class="contact-person-row">
        <div class="contact-person-avatar">
            <img src="{{ $contactPerson['avatar']['url'] }}" alt="{{ $contactPerson['avatar']['alt'] }}"
                class="contact-person-avatar__image" />

            {{ get_svg('resources.images.icon.plus', ['class' => 'contact-person-avatar__image-icon']) }}
        </div>

        <div class="contact-person-content">
            <h4 class="contact-person__title h5">
                {{ $contactPerson['name'] }}
            </h4>

            @if (!empty($contactPerson['role']))
                <p class="contact-person__role">
                    {{ $contactPerson['role'] }}
                </p>
            @endif

            @if (!empty($contactPerson['socials']))
                <ul class="contact-person-content__social social-links">
                    @foreach ($contactPerson['socials'] as $social)
                        <li class="social-links__item">
                            <a href="{{ $social['link']['url'] }}" class="social-links__link">
                                <img src="{{ $social['iconDark'] }}" class="social-links__link-icon" alt="">

                                <span class="social-links__link-text">
                                    {{ $social['link']['title'] }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
</div>
