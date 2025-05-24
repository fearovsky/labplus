<?php

namespace App\View\Composers;

use App\Services\PostService;
use Roots\Acorn\View\Composer;

class Page404Composer extends Composer
{
    private PostService $postService;
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    protected static $views = [
        '404',
    ];

    public function with(): array
    {
        return [
            'posts404' => $this->get404Posts(),
            'blogUrl' => $this->getBlogUrl(),
        ];
    }

    private function get404Posts(): array
    {
        $posts = get_field('404posts', 'option');
        if (empty($posts)) {
            return [];
        }

        return $this->postService->transformListToBoxes($posts);
    }

    private function getBlogUrl(): string
    {
        $blogPageId = get_option('page_for_posts');
        if (!$blogPageId) {
            return '';
        }

        return get_permalink($blogPageId);
    }
}
