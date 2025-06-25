<?php

namespace App\Utility;

use App\PostType\PatientStoryPostType;
use WP_Post;

class PostTypeUtlity
{
    public static function getMappedResource(WP_Post|string $postType): string
    {
        if ($postType instanceof WP_Post) {
            $postType = $postType->post_type;
        }

        return match ($postType) {
            'news' => __('Newsroom', 'labplus'),
            'resource' => __('Resource', 'labplus'),
            'case_study' => __('Case Study', 'labplus'),
            PatientStoryPostType::getPostType() => __('Patient Story', 'labplus'),
            default => __('Post', 'labplus'),
        };
    }

    public static function getMappedLinkText(WP_Post|string $postType): string
    {
        if ($postType instanceof WP_Post) {
            $postType = $postType->post_type;
        }

        return match ($postType) {
            'news' => __('Read more', 'labplus'),
            'resource' => __('View resource', 'labplus'),
            'case_study' => __('Read case study', 'labplus'),
            default => __('Learn more', 'labplus'),
        };
    }

    public static function getMappedHeadingForRelatedPosts(WP_Post|string $postType): string
    {
        if ($postType instanceof WP_Post) {
            $postType = $postType->post_type;
        }

        return match ($postType) {
            'news' => __('See more posts in Labplus Newsroom', 'labplus'),
            'resource' => __('See more resources', 'labplus'),
            'case_study' => __('See more case studies', 'labplus'),
            PatientStoryPostType::getPostType() => __('See more patient stories', 'labplus'),
            default => __('See more related posts', 'labplus'),
        };
    }
}
