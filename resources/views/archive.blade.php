@extends('layouts.app')

@section('content')
    <main class="main" role="main">
        @include('partials.archive.archive-header', [
            'hero' => $hero,
        ])

        @while (have_posts())
            @php(the_post())
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        @endwhile
    </main>
@endsection
