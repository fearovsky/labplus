@extends('layouts.app')

@section('content')

    @include('components.hero-background', [
        'field' => [
            'background' => [
                'url' => Vite::asset('resources/images/background/404.jpg'),
                'alt' => __('404 background', 'labplus'),
            ],
            'heading' => __('Looks like this page is <br/>unavailable.', 'labplus'),
            'content' => __('No worries – let’s get you back to the homepage.', 'labplus'),
            'button' => [
                'url' => '',
                'title' => __('Go to homepage', 'labplus'),
            ],
        ],
    ])
    @if (!empty($posts404))
        <section class="latest-resources">
            <div class="container">
                <div class="box-shadow-white">
                    <div class="section-title">
                        <h2 class="section-title__text">
                            {{ __('Is this a good time for a quick read?', 'labplus') }}
                        </h2>
                    </div>

                    <ul class="boxes-grid">
                        @foreach ($posts404 as $item)
                            <li class="boxes-grid-item">
                                @if ($item['thumbnail'])
                                    <div class="boxes-grid-item__image">
                                        {!! $item['thumbnail'] !!}
                                    </div>
                                @endif

                                <div class="boxes-grid-item__content">
                                    <p class="boxes-grid-item__content-category">
                                        {{ __('Labplus solutions', 'labplus') }}
                                    </p>

                                    <h4 class="boxes-grid-item__content-title">
                                        {!! $item['title'] !!}
                                    </h4>

                                    @include('components.link-more-icon', [
                                        'url' => $item['permalink'],
                                        'target' => '_self',
                                        'title' => __('Read post', 'labplus'),
                                    ])

                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="center-content spacing-4">
                        <a class="btn btn-primary" href="">
                            {{ __('See all posts', 'labplus') }}
                        </a>
                    </div>
                </div>
        </section>
    @endif
@endsection
