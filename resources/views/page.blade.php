@extends('layouts.app')

@section('content')
    <div class="grid-container">
        <div class="grid-row">
            <!-- Full width on mobile, half width on tablet, 4 columns on desktop -->
            <div class="grid-col-xs-12 grid-col-sm-6 grid-col-lg-4">Column 1</div>
            <div class="grid-col-xs-12 grid-col-sm-6 grid-col-lg-4">Column 2</div>
            <div class="grid-col-xs-12 grid-col-sm-6 grid-col-lg-4">Column 3</div>
        </div>
    </div>

    @while (have_posts())
        @php(the_post())
        @include('partials.page-header')
        @includeFirst(['partials.content-page', 'partials.content'])
    @endwhile
@endsection
