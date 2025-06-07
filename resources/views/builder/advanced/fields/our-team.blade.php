<section class="our-team">
    <div class="container">
        @if ($field['heading'])
            <div class="section-title">
                <h2 class="section-title__text">
                    {!! $field['heading'] !!}
                </h2>
            </div>
        @endif

        <div class="our-team-row">
            @if (!empty($field['groups']))
                <div class="our-team-groups">
                    @foreach ($field['groups'] as $group)
                        <div class="our-team-groups__group">
                            <h4 class="text-subheader our-team-groups__group-title">
                                {{ $group['title'] }}
                            </h4>

                            @if (!empty($group['members']))
                                <ul class="our-team-groups__list">
                                    @foreach ($group['members'] as $member)
                                        <li class="our-team-groups__list-item">
                                            <img src="{{ $member['url'] }}" alt="{{ $member['alt'] }}"
                                                class="our-team-groups__list-item__avatar">

                                            {{ get_svg('resources.images.icon.plus', ['class' => 'our-team-groups__list-item__plus']) }}

                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($field['title'])
                <div class="our-team-content">
                    <h5 class="our-team-content__title">
                        {!! $field['title'] !!}
                    </h5>

                    <div class="our-team-content__text">
                        {!! $field['content'] !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
