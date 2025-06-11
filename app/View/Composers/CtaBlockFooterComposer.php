<?php

namespace App\View\Composers;

use App\Utility\ImageUtility;
use Roots\Acorn\View\Composer;

class CtaBlockFooterComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'sections.footer'
    ];

    public function with()
    {
        return [
            'field' => $this->getCtaBlock(),
            'hide' => $this->shouldBeHidden()
        ];
    }

    private function getCtaBlock(): array
    {
        $fieldsToFetch = [
            'ctaTitle' => 'title',
            'ctaContent' => 'content',
            'ctaButton' => 'button',
            'ctaImage' => 'image',
            'ctaImageTitle' => 'titleImage',
            'ctaImageContent' => 'contentImage',
            'ctaLinks' => 'links'
        ];

        $output = [];

        foreach ($fieldsToFetch as $field => $mapped) {
            $outputField = get_field($field, get_the_ID());
            if (empty($outputField)) {
                $outputField = get_field($field, 'option');
            }

            if (empty($outputField)) {
                return [];
            }

            if ($field === 'ctaImage') {
                $outputField = ImageUtility::getImageSize($outputField, 'full');
            }

            $output[$mapped] = $outputField;
        }

        return $output;
    }

    private function shouldBeHidden(): bool
    {
        $shouldBeDisable = get_field('ctaDisable');

        return !empty($shouldBeDisable) && $shouldBeDisable === true;
    }
}
