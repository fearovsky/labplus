@extends('layouts.app')

@section('content')
    <section class="hero-with-background">
        <img src="{{ Vite::asset('resources/images/background/404.jpg') }}" alt="" class="hero-with-background__image">

        <div class="hero-with-background-content container">
            <h1 class="hero-with-background-content__title">
                {!! __('Looks like this page is <br/>unavailable.', 'labplus') !!}
            </h1>

            <p class="hero-with-background-content__description">
                {{ __('No worries – let’s get you back to the homepage.', 'labplus') }}
            </p>

            <a class="btn btn-primary btn--small btn-icon" href="">
                <span class="btn-icon__text">
                    {{ __('Go to homepage', 'labplus') }}
                </span>

                {{ get_svg('resources.images.icon.house', ['class' => 'btn-icon__img']) }}

            </a>
        </div>
    </section>
@endsection
