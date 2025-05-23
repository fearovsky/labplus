<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ACFSettingsProvider extends ServiceProvider
{

    public function boot(): void
    {
        add_filter('acf/settings/save_json', [$this, 'saveJsonLocally']);
        add_filter('acf/settings/load_json', [$this, 'loadJsonFromTheme']);
        add_action('acf/init', [$this, 'registerThemeSettings']);
    }

    public function saveJsonLocally($path): string
    {
        return get_stylesheet_directory() . '/resources/acf-json';
    }

    public function loadJsonFromTheme($paths): array
    {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/resources/acf-json';
        return $paths;
    }


    public function registerThemeSettings()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page([
                'page_title' => __('Ustawienia motywu', 'labplus'),
                'menu_title' => __('Ustawienia motywu', 'labplus'),
                'menu_slug' => 'theme-settings',
                'capability' => 'edit_posts',
                'redirect' => false,
            ]);

            acf_add_options_sub_page([
                'page_title' => __('Ustawienia 404', 'labplus'),
                'menu_title' => __('404', 'labplus'),
                'parent_slug' => 'theme-settings',
            ]);

            acf_add_options_sub_page([
                'page_title' => __('Ustawienia stopki', 'labplus'),
                'menu_title' => __('Stopka', 'labplus'),
                'parent_slug' => 'theme-settings',
            ]);
        }
    }
}
