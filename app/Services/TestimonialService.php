<?php

namespace App\Services;

use App\Utility\ImageUtility;

class TestimonialService
{
    public function getTestiomonialData(int $testimonialId)
    {
        $logo = get_field('logo', $testimonialId);
        $logo = $logo ? ImageUtility::getImageSize($logo ?? [], 'full') : [];
        $avatar = get_field('avatar', $testimonialId);
        $avatar = $avatar ? ImageUtility::getImageSize($avatar ?? [], 'full') : [];

        return [
            'logo' => $logo,
            'avatar' => $avatar,
            'name' => wp_kses_post(get_field('name', $testimonialId) ?? ''),
            'content' => wp_kses_post(get_field('content', $testimonialId) ?? ''),
            'role' => get_field('role', $testimonialId),
        ];
    }
}
