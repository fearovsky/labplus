<?php

namespace App\View\Fields;

use App\Services\LogosService;

class PartnersTaxonomyField extends BaseField
{
    private array $partners;

    public function __invoke(): array
    {
        return [
            'partners' => $this->partners,
        ];
    }

    protected function proccessFields(): void
    {
        $this->partners = $this->getPartners();
    }

    private function getPartners(): array
    {
        $taxonomy = $this->field['partners'];
        $logoColor = $this->field['logoColor'] ?? 'light';

        $logoServices = app(LogosService::class);

        return $logoServices->getLogosByTaxonomy($taxonomy, $logoColor);
    }

}
