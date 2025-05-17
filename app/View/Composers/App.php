<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    public function with(): array
    {
        return [
            'siteName' => $this->siteName(),
            'languagesActive' => $this->isLanguageActive()
        ];
    }

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }


    private function isLanguageActive(): bool
    {
        return function_exists('pll_the_languages');
    }
}
