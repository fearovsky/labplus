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


        // load vlaue for field_685ba3794ab3c
        add_filter('acf/load_field/key=field_685ba3794ab3c', [$this, 'loadAllPolylangSelectedLanguageToCheckbox'], 10, 1);
        // polylang display by selected language
        add_filter('pll_the_languages', [$this, 'filterLanguages'], 10, 2);
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
                'page_title' => __('Ustawienia kalkulatora', 'labplus'),
                'menu_title' => __('Kalkulator', 'labplus'),
                'parent_slug' => 'theme-settings',
            ]);

            acf_add_options_sub_page([
                'page_title' => __('Ustawienia stopki', 'labplus'),
                'menu_title' => __('Stopka', 'labplus'),
                'parent_slug' => 'theme-settings',
            ]);

            acf_add_options_sub_page([
                'page_title' => __('Ustawienia archiwum', 'labplus'),
                'menu_title' => __('Archiwum', 'labplus'),
                'parent_slug' => 'theme-settings',
            ]);
        }
    }

    public function loadAllPolylangSelectedLanguageToCheckbox($field)
    {
        if (!function_exists('pll_the_languages')) {
            return $field;
        }

        $languages = pll_the_languages(['raw' => 1, 'hide_if_empty' => 0]);
        if (empty($languages)) {
            return $field;
        }

        $field['choices'] = [];
        foreach ($languages as $lang) {
            $field['choices'][$lang['slug']] = $lang['name'];
        }

        return $field;
    }

    public function filterLanguages($languages, $args)
    {
        $selectedLanguage = get_field('languageToSelect', 'option');
        if (empty($selectedLanguage)) {
            return $languages;
        }

        $selectedLanguage = array_values($selectedLanguage);

        $languages = pll_the_languages(['raw' => 1]);

        $filtered_languages = array_filter($languages, function ($lang) use ($selectedLanguage) {
            return in_array($lang['slug'], $selectedLanguage);
        });

        if (empty($filtered_languages)) {
            return '';
        }

        // Generate new output
        $new_output = '';
        foreach ($filtered_languages as $lang) {
            $class = $lang['current_lang'] ? 'current-lang' : '';
            $new_output .= '<li class="lang-item ' . $class . '">';
            $new_output .= '<a href="' . $lang['url'] . '">' . $lang['name'] . '</a>';
            $new_output .= '</li>';
        }

        return $new_output;
    }
}
