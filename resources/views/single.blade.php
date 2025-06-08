@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        @includeFirst(['partials.single.content-' . get_post_type(), 'partials.content'])
    @endwhile
@endsection
