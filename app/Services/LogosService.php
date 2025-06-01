<?php

namespace App\Services;

use WP_Query;
use App\PostType\LogoPostType;
use App\Taxonomy\LogoGroupTaxonomy;
use App\Utility\ImageUtility;

class LogosService
{
    public function getLogosByTaxonomy(int $taxonomy, string $logoType): array
    {
        $query = new WP_Query([
            'post_type' => LogoPostType::getPostType(),
            'posts_per_page' => -1,
            'tax_query' => [
                [
                    'taxonomy' => LogoGroupTaxonomy::getTaxonomy(),
                    'field' => 'term_id',
                    'terms' => $taxonomy,
                ],
            ],
        ]);

        if (!$query->have_posts()) {
            return [];
        }

        return array_map(function ($post) use ($logoType) {
            $logo = get_field($logoType, $post->ID);
            if (!$logo) {
                return null;
            }

            return [
                'logo' => $logo,
                'link' => [
                    'url' => '#',
                    'target' => '_blank',
                ]
            ];
        }, $query->posts);
    }
}
