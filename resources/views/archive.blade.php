@extends('layouts.app')

@section('content')
    <main class="main" role="main">
        @include('partials.archive.archive-header', [
            'hero' => $hero,
        ])

        @if (!empty($partners))
            @include('builder.advanced.fields.partners', [
                'field' => [
                    'partners' => $partners ?? [],
                    'heading' => __('Trusted by leading labs & Healthcare providers', 'labplus'),
                ],
            ])
        @endif

        <section class="archive-main">
            <div class="container">
                @if (!empty($heading))
                    <div class="section-title">
                        <h1 class="section-title__text">
                            {!! $heading !!}
                        </h1>
                    </div>
                @endif

                @if (!empty($terms))
                    <div class="archive-terms">
                        @include('partials.archive.archive-terms', [
                            'terms' => $terms['terms'],
                            'taxonomy' => $terms['taxonomy'],
                        ])
                    </div>
                @endif

                @if (!empty($items))
                    <ul class="archive-posts">
                        @foreach ($items as $item)
                            <li class="archive-posts-item">
                                <a class="archive-posts-item__header" href="{{ $item['permalink'] }}">
                                    {!! $item['thumbnail'] !!}
                                </a>

                                <div class="archive-posts-item__box">
                                    <h3 class="archive-posts-item__title h6">
                                        <a href="{{ $item['permalink'] }}" class="archive-posts-item__title-link">
                                            {{ $item['title'] }}
                                        </a>
                                    </h3>

                                    <p class="archive-posts-item__content">
                                        {!! $item['excerpt'] !!}
                                    </p>

                                    @include('components.link-more-icon', [
                                        'url' => $item['permalink'],
                                        'target' => '_self',
                                        'title' => __('Read case study', 'labplus'),
                                    ])
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    </main>
@endsection
