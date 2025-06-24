<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PatientComposer extends Composer
{
    private ?string $healthRaport;
    private ?int $healthRaportImage = null;

    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'partials.single.content-patient_story'
    ];

    public function __construct()
    {
        $this->proccessFields();
        add_action('wp_footer', [$this, 'renderModal']);
    }

    public function with(): array
    {
        return [
            'healthRaport' => $this->healthRaport,
            'healthRaportImage' => $this->healthRaportImage,
        ];
    }

    protected function proccessFields(): void
    {
        $this->healthRaport = $this->getHealthRaport();
        $this->healthRaportImage = $this->getHealthRaportImage();
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

    public function renderModal(): void
    {
        if (empty($this->healthRaport)) {
            return;
        }


        echo view('components.modal', [
            'title' => __('Interpreted lab test results', 'lab'),
            'slot' => wp_get_attachment_image(
                $this->healthRaport,
                'full',
                false,
                [
                    'class' => 'w-full h-auto',
                ]
            ),
            'modalId' => 'healthRaport',
        ])->render();
    }
}
