<?php

namespace App\Utility;

class PostTypeUtlity
{
    public static function getMappedResource(string $postType): string
    {
        return match ($postType) {
            'news' => 'NewsPostType',
            'resource' => 'ResourcePostType',
            'case_study' => 'CaseStudyPostType',
            default => 'UnknownPostType',
        };
    }

    public static function getMappedLinkText(string $postType): string
    {
        return match ($postType) {
            'news' => __('Read more', 'labplus'),
            'resource' => __('View resource', 'labplus'),
            'case_study' => __('Read case study', 'labplus'),
            default => __('Learn more', 'labplus'),
        };
    }
}
