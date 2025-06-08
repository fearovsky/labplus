<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Taxonomy\NewsCategoryTaxonomy;

class NewsComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'partials.single.content-news',
    ];

    /**
     * Data to be passed to the view.
     *
     * @return array
     */
    public function with()
    {
        return [
            'readingTime' => $this->getReadingTime(),
            'introText' => $this->getIntroText(),
            'date' => $this->getDate(),
            'categories' => $this->getCategories(),
        ];
    }

    public function getReadingTime(): ?string
    {
        $readingTime = get_field('readingTime');
        if (empty($readingTime)) {
            return null;
        }

        return sprintf(
            __('<b>%d minutes</b> read', 'labplus'),
            absint($readingTime)
        );
    }

    public function getIntroText(): ?string
    {
        $introText = get_field('introText');
        if (empty($introText)) {
            return null;
        }

        return $introText;
    }

    public function getDate(): ?string
    {
        return get_the_date('F j, Y');
    }

    public function getCategories(): array
    {
        $categories = get_the_terms(get_the_ID(), NewsCategoryTaxonomy::getTaxonomy());
        if (empty($categories) || is_wp_error($categories)) {
            return [];
        }

        return array_map(function ($category) {
            return $category->name;
        }, $categories);
    }
}
