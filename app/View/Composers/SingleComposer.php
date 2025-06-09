<?php

namespace App\View\Composers;

use WP_Query;
use App\Services\PostService;
use App\PostType\NewsPostType;
use Roots\Acorn\View\Composer;
use App\Utility\PostTypeUtlity;
use App\PostType\ResourcePostType;
use App\PostType\CaseStudyPostType;
use App\Taxonomy\NewsCategoryTaxonomy;
use App\Taxonomy\ResourceCategoryTaxonomy;
use App\Taxonomy\CaseStudyCategoryTaxonomy;

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
            'posts' => $this->getRelatedPosts(),
            'mappedResources' => PostTypeUtlity::getMappedResource($this->postType),
            'resourceLinkText' => PostTypeUtlity::getMappedLinkText($this->postType),
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

    private function getRelatedPosts(): array
    {
        $query = new WP_Query([
            'post_type' => $this->postType,
            'posts_per_page' => 3,
            'post__not_in' => [$this->postId],
            'tax_query' => [
                [
                    'taxonomy' => $this->getTaxonomyBasedOnPostType(),
                    'field' => 'term_id',
                    'terms' => get_the_terms($this->postId, $this->getTaxonomyBasedOnPostType())[0]->term_id ?? [],
                ],
            ],
        ]);

        if (!$query->have_posts()) {
            return [];
        }

        $serviceClass = app()->make(PostService::class);

        return $serviceClass->transformListToBoxes($query->posts);
    }

    private function getTaxonomyBasedOnPostType(): string
    {
        switch ($this->postType) {
            case NewsPostType::getPostType():
                return NewsCategoryTaxonomy::getTaxonomy();
            case CaseStudyPostType::getPostType():
                return CaseStudyCategoryTaxonomy::getTaxonomy();
            case ResourcePostType::getPostType():
                return ResourceCategoryTaxonomy::getTaxonomy();
            default:
                return 'category';
        }
    }
}
