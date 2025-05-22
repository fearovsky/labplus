<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FooterComposer extends Composer
{
    private array $informationBoxes = [
        'footerInfoFirstBox' => '--first',
        'footerInfoSecondBox' => '--second',
        'footerInfoThirdBox' => '--third',
    ];

    private array $informationNav = [
        'footerRulesFirstNav' => '--first',
        'footerRulesSecondNav' => '--second',
    ];

    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'sections.footer'
    ];

    public function with(): array
    {
        return [
            'rulesInformation' => $this->getRulesInformation(),
            'boxes' => $this->getBoxes(),
            'informationBoxes' => $this->getInformationBoxes(),
            'informationNav' => $this->getInformationNav(),
        ];
    }

    private function getRulesInformation(): string
    {
        $rulesInformation = get_field('rulesinformation');
        return $rulesInformation ? $rulesInformation : '';
    }
    private function getInformationBoxes(): array
    {
        $informationBoxes = [];
        foreach ($this->informationBoxes as $key => $value) {
            $informationBox = get_field($key, 'options');
            if (empty($informationBox)) {
                continue;
            }

            $informationBoxes[$value] = $informationBox;
        }

        return $informationBoxes;
    }

    private function getInformationNav(): array
    {
        $informationNav = [];
        foreach ($this->informationNav as $key => $value) {
            $informationNavItem = get_field($key, 'options');
            if (empty($informationNavItem)) {
                continue;
            }

            $informationNav[$value] = $informationNavItem;
        }

        return $informationNav;
    }


    private function getBoxes(): array
    {
        $footerBoxes = get_field('footerBoxes', 'options');
        if (empty($footerBoxes)) {
            return [];
        }

        return $footerBoxes;
    }
}
