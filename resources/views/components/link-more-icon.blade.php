<a class="link-more{{ !empty($class) ? ' link-more--reverse' : null }}" href="{{ $url }}"
    target="{{ $target }}">
    <span class="link-more__text">
        {{ $title }}
        {{ get_svg('resources.images.icon.' . (!empty($icon) && $icon !== null ? $icon : 'arrow-left-accent'), ['class' => 'link-more__icon']) }}
    </span>
</a>
