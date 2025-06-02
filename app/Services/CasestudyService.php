<?php

namespace App\Services;

use App\Utility\ImageUtility;

class CasestudyService
{
    public function appendLogosToPosts(array $posts): array
    {
        if (empty($posts)) {
            return $posts;
        }

        foreach ($posts as &$post) {
            $testimonial = get_field('testimonial', $post['id']);
            if (!$testimonial) {
                continue;
            }

            $logo = get_field('logo', $testimonial);
            if (empty($logo)) {
                continue;
            }


            $post['logo'] = ImageUtility::getImageSize($logo, 'full');
        }

        return $posts;
    }
}
