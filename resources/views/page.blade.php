@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        @include('builder.advanced.builder-advanced')
    @endwhile
@endsection
