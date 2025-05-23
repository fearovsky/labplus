<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page404Composer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        '404',
    ];

    public function with(): array
    {
        return [
            'posts404' => $this->get404Posts()
        ];
    }

    private function get404Posts(): array
    {
        $posts = get_field('404posts', 'option');
        if (empty($posts)) {
            return [];
        }

        return array_map(function ($post) {
            return [
                'title' => get_the_title($post),
                'thumbnail' => get_the_post_thumbnail($post, 'large', [
                    'class' => 'boxes-grid-item__image-thumbnail',
                ]),
                'permalink' => get_permalink($post),
            ];
        }, $posts);
    }
}
