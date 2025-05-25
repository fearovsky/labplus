<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class CalculatorComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'builder.advanced.fields.calculator'
    ];

    public function with(): array
    {
        return [
            'commercialTestText' => $this->getCommercialTestText(),
            'commercialTestTooltip' => $this->getCommercialTestTooltip(),
            'commercialTestMin' => $this->getCommercialTestMin(),
            'commercialTestMax' => $this->getCommercialTestMax(),
            'commercialAvgText' => $this->getCommercialAvgText(),
            'commercialAvgTooltip' => $this->getCommercialAvgTooltip(),
            'commercialAvgMin' => $this->getCommercialAvgMin(),
            'commercialAvgMax' => $this->getCommercialAvgMax(),
            'howIsCalculatedTooltip' => $this->getHowIsCalculatedTooltip(),
            'link' => $this->getLink(),
        ];
    }

    public function getCommercialTestText(): string
    {
        return get_field('commercialTestText', 'option') ?: __('Commercial test orders volume per month', 'labplus');
    }

    public function getCommercialTestTooltip(): string
    {
        return get_field('commercialTestTooltip', 'option') ?: __('Average value (in EUR) of one commercial lab test order.', 'labplus');
    }

    public function getCommercialTestMin(): int
    {
        return absint(get_field('commercialTestMin', 'option') ?: 20000);
    }

    public function getCommercialTestMax(): int
    {
        return absint(get_field('commercialTestMax', 'option') ?: 500000);
    }

    public function getCommercialAvgText(): string
    {
        return get_field('commercialAvgText', 'option') ?: __('Average commercial test order value', 'labplus');
    }

    public function getCommercialAvgTooltip(): string
    {
        return get_field('commercialAvgTooltip', 'option') ?: __('Average value (in EUR) of one commercial lab test order.', 'labplus');
    }

    public function getCommercialAvgMin(): int
    {
        return absint(get_field('commercialAvgMin', 'option') ?: 20);
    }

    public function getCommercialAvgMax(): int
    {
        return absint(get_field('commercialAvgMax', 'option') ?: 100);
    }

    public function getHowIsCalculatedTooltip(): string
    {
        return get_field('howIsCalculatedTooltip', 'option') ?: __('This is a tooltip explaining how the calculation is done.', 'labplus');
    }

    public function getLink(): ?array
    {
        $link = get_field('calculatorLink', 'option');
        if (!$link) {
            return null;
        }

        return [
            'url' => $link['url'] ?? '',
            'title' => $link['title'] ?? '',
            'target' => $link['target'] ?? '_self',
        ];
    }

}
