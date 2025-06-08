<?php

// ===========================================
// FIXED SERVICE PROVIDER
// ===========================================

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TinyMCEProvider extends ServiceProvider
{
    private array $customComponents = [
        'simple_separator' => [
            'plugin_file' => 'plugin.js',
            'button_name' => 'simple_separator_button'
        ],
        'callout' => [
            'plugin_file' => 'callout-plugin.js',
            'button_name' => 'callout_button'
        ]
    ];

    public function boot(): void
    {
        add_action('init', [$this, 'initTinyMCE'], 20);
    }

    public function initTinyMCE(): void
    {
        if (!is_admin() || (!current_user_can('edit_posts') && !current_user_can('edit_pages'))) {
            return;
        }

        add_filter('mce_external_plugins', [$this, 'addTinyMCEPlugins']);
        add_filter('mce_buttons', [$this, 'addTinyMCEButtons']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueFrontendAssets']);
        add_action('admin_init', [$this, 'addAdminEditorStyle']);

    }

    public function addTinyMCEPlugins(array $plugins): array
    {
        foreach ($this->customComponents as $componentName => $config) {
            $plugins[$componentName] = get_template_directory_uri() . '/resources/tiny/' . $config['plugin_file'];
        }
        return $plugins;
    }

    public function addTinyMCEButtons(array $buttons): array
    {
        foreach ($this->customComponents as $config) {
            $buttons[] = $config['button_name'];
        }
        return $buttons;
    }

    public function enqueueFrontendAssets(): void
    {
        wp_enqueue_style('simple-separator-frontend', get_template_directory_uri() . '/resources/tiny/frontend-style.css');
    }

    public function addAdminEditorStyle(): void
    {
        add_editor_style('resources/tiny/editor-style.css');
    }
}
