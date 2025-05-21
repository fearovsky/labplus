<section class="members">
    <div class="container">
        @if ($field['heading'])
            <div class="section-title section-title--sub">
                <h3 class="text-subheader">
                    {!! $field['heading'] !!}
                </h3>
            </div>
        @endif

        <ul class="members-list">
            @foreach ($field['members'] as $member)
                <li class="members-item">
                    @if ($member['avatar'])
                        <div class="members-item__avatar">
                            <img src="{{ $member['avatar']['url'] }}" alt="{{ $member['avatar']['alt'] }}"
                                class="members-item__avatar-image">

                            {{ get_svg('resources.images.icon.plus', ['class' => 'members-item__avatar-icon']) }}
                        </div>
                    @endif

                    <p class="members-item__name">
                        {{ $member['name'] }}
                    </p>

                    <p class="members-item__content">
                        {!! $member['content'] !!}
                    </p>

                    @if ($member['achievements'])
                        <p class="members-item__achievements">
                            {!! $member['achievements'] !!}
                        </p>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</section>
