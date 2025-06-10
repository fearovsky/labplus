<section class="rules">
    <div class="container">
        @if (!empty($field['heading']))
            <div class="section-title">
                <h1 class="section-title__text">
                    {!! $field['heading'] !!}
                </h1>
            </div>
        @endif

        @if (!empty($field['groups']))
            <div class="rules-groups">
                @foreach ($field['groups'] as $group)
                    <div class="rules-groups__single">
                        <h2 class="rules-groups__title">
                            {{ $group['title'] }}
                        </h2>

                        <ul class="download-list">
                            @foreach ($group['items'] as $downloadItem)
                                <li class="download-list__item">
                                    <a href="{{ $downloadItem['file'] }}" class="download-list__link" download>
                                        <span class="download-list__text h6">
                                            {{ $downloadItem['file_name'] }}
                                        </span>

                                        <span class="btn btn-secondary btn-icon btn--small">
                                            <span class="btn-icon__text">
                                                {{ __('Download', 'labplus') }}
                                            </span>

                                            {{ get_svg('resources.images.icon.fetch', ['class' => 'btn-icon__img']) }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
