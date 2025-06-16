<li id="menu-item-social" class="menu-item nav-social">
    <ul class="nav-social__list">
        @php
            pll_the_languages([
                'dropdown' => 0,
                'show_flags' => 1,
                'show_names' => 0,
                'hide_if_empty' => 0,
                'hide_current' => 0,
            ]);
        @endphp
    </ul>
</li>
