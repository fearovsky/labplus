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
            'ctaImageMobile' => 'imageMobile',
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
                continue;
            }

            if ($field === 'ctaImage') {
                $outputField = ImageUtility::getImageSize($outputField, 'full');
            }

            if ($field === 'ctaImageMobile') {
                $outputField = wp_get_attachment_image($outputField, 'full', false, [
                    'class' => 'get-in-touch-image__mobile',
                ]);
            }


            $output[$mapped] = $outputField;
        }

        return $output;
    }

    private function shouldBeHidden(): bool
    {
        if (is_404()) {
            return true;
        }

        $shouldBeDisable = get_field('ctaDisable');

        return !empty($shouldBeDisable) && $shouldBeDisable === true;
    }
}
