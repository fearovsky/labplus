<?php

namespace App\View\Fields;

use App\Services\LogosService;

class PartnersTaxonomyField extends BaseField
{
    private ?string $heading;
    private array $partners;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'partners' => $this->partners,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->partners = $this->getPartners();
    }

    protected function getHeading(): ?string
    {
        if (empty($this->field['heading'])) {
            return null;
        }

        return wp_kses_post($this->field['heading']);
    }

    private function getPartners(): array
    {
        $taxonomy = $this->field['partners'];
        $logoColor = $this->field['logoColor'] ?? 'light';

        $logoServices = app(LogosService::class);

        return $logoServices->getLogosByTaxonomy($taxonomy, $logoColor);
    }

}
