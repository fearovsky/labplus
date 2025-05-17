<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class HeaderComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'sections.header'
    ];

    public function with(): array
    {
        return [
            'socialMedia' => $this->getSocialMedia()
        ];
    }

    private function getSocialMedia(): array
    {
        $social = get_field('socialMedia', 'option');
        if (empty($social)) {
            return [];
        }

        return $this->transformToSectionList($social);
    }

    private function transformToSectionList(array $items): array
    {
        return array_filter($items, function ($item) {
            return $item['headerDisplay'];
        });
    }
}
