<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PatientComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'partials.single.content-patient_story'
    ];

    public function with(): array
    {
        return [
            'healthRaport' => $this->getHealthRaport(),
            'healthRaportImage' => $this->getHealthRaportImage(),
        ];
    }

    /**
     * Get the health report.
     *
     * @return string
     */
    private function getHealthRaport(): ?string
    {
        $healthRaport = get_field('healthRaport');
        if (!$healthRaport) {
            return null;
        }

        return $healthRaport;
    }

    /**
     * Get the health report image.
     *
     * @return string
     */
    private function getHealthRaportImage(): ?int
    {
        $healthRaportImage = get_field('healthRaportThumbnail');
        if (!$healthRaportImage) {
            return null;
        }

        return absint($healthRaportImage);
    }
}
