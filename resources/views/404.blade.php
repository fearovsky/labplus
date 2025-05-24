@extends('layouts.app')

@section('content')
    @include('components.hero-background', [
        'field' => [
            'background' => [
                'url' => Vite::asset('resources/images/background/404.jpg'),
                'alt' => __('404 background', 'labplus'),
            ],
            'heading' => __('Looks like this page is <br/>unavailable.', 'labplus'),
            'content' => __('No worries – let’s get you back to the homepage.', 'labplus'),
            'button' => [
                'url' => '',
                'title' => __('Go to homepage', 'labplus'),
            ],
        ],
    ])

    @include('builder.advanced.fields.box-posts', [
        'field' => [
            'heading' => __('Latest resources', 'labplus'),
            'posts' => $posts404,
            'link' => [
                'url' => $blogUrl,
                'title' => __('See all posts', 'labplus'),
                'target' => '_self',
            ],
        ],
    ])
@endsection
