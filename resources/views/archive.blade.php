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

        @while (have_posts())
            @php(the_post())
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        @endwhile
    </main>
@endsection
