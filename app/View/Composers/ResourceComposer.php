<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Taxonomy\NewsCategoryTaxonomy;
use App\Taxonomy\ResourceCategoryTaxonomy;

class ResourceComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'partials.single.content-resource',
    ];

    /**
     * Data to be passed to the view.
     *
     * @return array
     */
    public function with()
    {
        return [
            'categories' => $this->getCategories(),
            'avatar' => $this->getAvatar(),
            'downloadLink' => $this->getDownloadLink()
        ];
    }

    public function getCategories(): array
    {
        $categories = get_the_terms(get_the_ID(), ResourceCategoryTaxonomy::getTaxonomy());
        if (empty($categories) || is_wp_error($categories)) {
            return [];
        }

        return array_map(function ($category) {
            return $category->name;
        }, $categories);
    }

    public function getAvatar(): array
    {
        $avatar = get_field('authorAvatar');
        if (empty($avatar)) {
            return [];
        }

        return [
            'image' => $avatar,
            'name' => get_field('authorName'),
            'role' => get_field('authorRole'),
        ];
    }

    public function getDownloadLink(): ?string
    {
        $downloadLink = get_field('downloadFile');
        if (empty($downloadLink)) {
            return null;
        }

        return $downloadLink;
    }
}
