@php
    $videoSource = $field['videoSource'] ?: 'youtube';
    $video = $videoSource === 'youtube' ? $field['video'] : $field['videoSelf'];
@endphp

<section class="hero-section-image hero-section-image--video">
    <div class="container hero-section-image-container">
        <div class="hero-section-image-row">
            <div class="hero-section-image-content">
                @if ($field['preheading'])
                    <p class="hero-section-image-content__preheading">
                        {!! $field['preheading'] !!}
                    </p>
                @endif

                @if (!empty($field['heading']))
                    <h1 class="hero-section-image-content__heading">
                        {!! $field['heading'] !!}
                    </h1>
                @endif

                @if ($field['button'])
                    <a class="btn btn-secondary" href="{{ $field['button']['url'] }}"
                        target="{{ $field['button']['target'] }}">
                        {{ $field['button']['title'] }}
                    </a>
                @endif
            </div>



            @if ($field['video'])
                <div class="hero-section-image-thumbnail hero-section-image-thumbnail--video">
                    @if ($videoSource === 'self')
                        <video class="hero-section-image-thumbnail__video" src="{{ $video }}" controls>
                        </video>
                    @else
                        {!! $video !!}
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
