@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        @include('builder.fields.builder-advanced')
    @endwhile
@endsection
