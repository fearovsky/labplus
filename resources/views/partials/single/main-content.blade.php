<div class="container">
    <div class="single-post-row">
        @include('partials.single.main-content-aside', [
            'archiveLink' => $archiveLink,
            'backToText' => $backToText,
        ])

        <div class="single-post-builder">
            @yield('single-post-content')
            @include('builder.single.builder-single')
            @yield('single-post-after-content')
        </div>
    </div>
</div>
