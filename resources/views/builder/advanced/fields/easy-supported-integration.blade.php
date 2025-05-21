<section class="easy-supported-integration">
    <div class="container">
        <div class="easy-supported-integration-box">
            @if ($field['heading'])
                <div class="section-title aligncenter">
                    <h2>{{ $field['heading'] }}</h2>
                </div>
            @endif


            @if (!empty($field['inNumbers']))
                <div class="easy-supported-integration__numbers">
                    <ul class="grid-shadow-boxes">
                        @foreach ($field['inNumbers'] as $item)
                            <li class="grid-shadow-boxes-item">
                                <p class="grid-shadow-boxes-item__header">
                                    <strong class="grid-shadow-boxes-item__header-number">
                                        {{ $item['number'] }}
                                    </strong>
                                    <span class="grid-shadow-boxes-item__header-text">
                                        {{ $item['title'] }}
                                    </span>
                                </p>

                                <p class="grid-shadow-boxes-item__content">
                                    {{ $item['content'] }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="easy-supported-integration-row">
                <div class="easy-supported-integration-content">
                    <p class="easy-supported-integration-content__text strong">
                        {{ $field['content'] }}
                    </p>

                    @if (!empty($field['iconsText']))
                        <ul class="text-icons">
                            @foreach ($field['iconsText'] as $iconText)
                                <li class="text-icons-item">
                                    <img src="{{ $iconText['icon']['url'] }}" class="text-icons-item__icon"
                                        alt="{{ $iconText['icon']['alt'] }}">
                                    <p class="text-icons-item__text">
                                        {{ $iconText['content'] }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>



                <div class="easy-supported-integration-cta">
                    <div class="cta-highlited-box">
                        <p class="cta-highlited-box__subtitle">
                            {{ $field['resource']['subtitle'] }}
                        </p>

                        <h3 class="cta-highlited-box__title h5">
                            {{ $field['resource']['title'] }}
                        </h3>

                        <p class="cta-highlited-box__text">
                            {{ $field['resource']['content'] }}
                        </p>

                        @if (!empty($field['resource']['read_now']))
                            <a class="link-more" href="{{ $field['resource']['read_now']['url'] }}"
                                target="{{ $field['resource']['read_now']['target'] }}">
                                <span class="link-more__text">
                                    {{ $field['resource']['read_now']['title'] }}
                                    {{ get_svg('resources.images.icon.arrow-left-accent', ['class' => 'link-more__icon']) }}
                                </span>


                            </a>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
