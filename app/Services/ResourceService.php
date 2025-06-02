<?php

namespace App\Services;

use App\Services\TermsService;
use App\Taxonomy\ResourceCategoryTaxonomy;

class ResourceService
{
    public function __construct(private TermsService $termsService)
    {
    }

    public function getPost(int $postId, string $imageClass = 'thumbnail')
    {
        $post = get_post($postId);

        if (!$post) {
            return null;
        }

        $terms = get_the_terms($post->ID, ResourceCategoryTaxonomy::getTaxonomy());

        return [
            'id' => $post->ID,
            'title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'permalink' => get_permalink($post->ID),
            'categories' => $terms ? $this->termsService->getPreparedTerms($terms) : [],
            'thumbnail' => get_the_post_thumbnail($post->ID, 'full', ['class' => $imageClass]),
            'readMore' => __('Open raport', 'labplus'),
        ];
    }
}
