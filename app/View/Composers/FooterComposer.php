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
            'socialMedia' => $this->getSocialMedia(),
            'privacy' => $this->getPrivacy()
        ];
    }

    private function getRulesInformation(): ?string
    {
        if (is_archive()) {
            return $this->getArchiveRulesInformation();
        }

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

    private function getSocialMedia(): array
    {
        $social = get_field('socialMedia', 'option');
        if (empty($social)) {
            return [];
        }

        return $social;
    }

    private function getPrivacy(): array
    {
        $privacyText = get_field('footerPrivacyText', 'options');
        if (empty($privacyText)) {
            return [];
        }

        return [
            'text' => $privacyText,
            'links' => get_field('footerPrivacyLinks', 'options') ?: []
        ];
    }

    private function getArchiveRulesInformation(): ?string
    {
        if (!is_archive()) {
            return null;
        }

        return match (get_queried_object()->name) {
            'resource' => get_field('resourceRules', 'options'),
            'patient_story' => get_field('patientRules', 'options'),
            'case_study' => get_field('caseRules', 'options'),
            'news' => get_field('newsRules', 'options'),
            default => null,
        };
    }
}
