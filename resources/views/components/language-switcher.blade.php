@if ($languagesActive)
    <div class="{{ isset($classes) ? $classes + ' ' : null }}switcher">
        <span class="switcher__name">
            {{ pll_current_language('name') }}
        </span>
        <ul class="switcher__list">
            @php
                pll_the_languages([
                    'hide_current' => 1,
                    'hide_if_empty' => 1,
                ]);
            @endphp
        </ul>
    </div>
@endif
