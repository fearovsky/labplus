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
            'languagesActive' => $this->isLanguageActive(),
            'password_protected' => $this->isPasswordProtected(),
            'password_form_html' => $this->getPasswordForm()
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

    /**
     * Check if the current content is password protected.
     */
    private function isPasswordProtected(): bool
    {
        return post_password_required();
    }

    /**
     * Get the password form HTML.
     */
    private function getPasswordForm(): ?string
    {
        if (!post_password_required()) {
            return null;
        }

        // Get the password form
        $password_form = get_the_password_form();

        // Wrap the submit button with theme button classes
        $password_form = preg_replace(
            '/(<input[^>]*type="submit"[^>]*>)/',
            '<button type="submit" class="btn btn-primary btn-full">' . __('Zobacz treść', 'lab') . '</button>',
            $password_form
        );

        return $password_form;
    }
}
