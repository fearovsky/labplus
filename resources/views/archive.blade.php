@extends('layouts.app')

@section('content')
    <main class="main" role="main">
        @if (!empty($hero))
            @include('partials.archive.archive-header', [
                'hero' => $hero,
            ])
        @endif

        @if (!empty($partners))
            @include('builder.advanced.fields.partners', [
                'field' => [
                    'partners' => $partners ?? [],
                    'heading' => __('Trusted by leading labs & Healthcare providers', 'labplus'),
                ],
            ])
        @endif

        <section class="archive-main" id="archive">
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
                            'postType' => $postType,
                        ])
                    </div>
                @endif

                @if (!empty($items))
                    @include('partials.archive.case.archive-case-list', [
                        'items' => $items,
                        'paged' => $paged,
                        'maxPages' => $maxPages,
                    ])
                @endif

                @if (!empty($pagination))
                    @include('partials.archive.pagination', [
                        'pagination' => $pagination,
                    ])
                @endif
            </div>
        </section>
    </main>
@endsection
