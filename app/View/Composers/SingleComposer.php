<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SingleComposer extends Composer
{
    private ?int $postId = null;
    private string $postType;

    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'single',
    ];

    public function __construct()
    {
        $this->postType = get_post_type();
        $this->postId = get_the_ID();
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'ctaBlock' => $this->getCtaBlock(),
            'title' => get_the_title($this->postId),
            'excerpt' => get_the_excerpt($this->postId),
            'archiveLink' => get_post_type_archive_link($this->postType),
        ];
    }

    private function getCtaBlock(): ?array
    {
        $title = get_field('ctaTitle', $this->postId);
        if (empty($title)) {
            return null;
        }

        return [
            'title' => $title,
            'content' => get_field('ctaContent', $this->postId),
            'button' => get_field('ctaLink', $this->postId),
        ];
    }
}
