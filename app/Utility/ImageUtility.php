<?php

namespace App\Utility;

class ImageUtility
{
    public static function getImageSize(array $image, string $size = 'full'): array
    {
        if (empty($image)) {
            return [];
        }

        if (empty($image['sizes'])) {
            return [];
        }

        if (!isset($image['sizes'][$size])) {
            return [];
        }

        return [
            'url' => $image['sizes'][$size],
            'alt' => $image['alt'] ?? '',
        ];
    }
}
