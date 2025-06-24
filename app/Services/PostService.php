<?php

namespace App\Services;

use App\Utility\PostTypeUtlity;

class PostService
{
    public function transformListToBoxes(array $posts)
    {
        if (empty($posts)) {
            return [];
        }

        return array_map(function ($post) {
            return [
                'title' => get_the_title($post),
                'thumbnail' => get_the_post_thumbnail($post, 'large', [
                    'class' => 'boxes-grid-item__image-thumbnail',
                ]),
                'resourceName' => PostTypeUtlity::getMappedResource($post),
                'permalink' => get_permalink($post),
            ];
        }, $posts);
    }

    public function getPostTypeName($post): ?string
    {
        return null;
    }
}
