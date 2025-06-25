@extends('layouts.app')

@section('content')
    @include('partials.page-header')

    @if (!have_posts())
        @include('partials.alert', [
            'type' => 'warning',
            'content' => __('Sorry, no results were found.', 'lab'),
        ])
    @endif

    @while (have_posts())
        @php(the_post())
        @include('partials.content-search')
    @endwhile

    {!! get_the_posts_navigation() !!}
@endsection
