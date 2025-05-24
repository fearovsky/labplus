<?php

// ===========================================
// FIXED SERVICE PROVIDER
// ===========================================

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TinyMCEProvider extends ServiceProvider
{
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
        add_action('wp_enqueue_editor', [$this, 'enqueueEditorAssets']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueFrontendAssets']);
    }

    public function addTinyMCEPlugins(array $plugins): array
    {
        $plugins['simple_separator'] = get_template_directory_uri() . '/resources/tiny/plugin.js';
        return $plugins;
    }

    public function addTinyMCEButtons(array $buttons): array
    {
        $buttons[] = 'simple_separator_button';
        return $buttons;
    }

    public function enqueueEditorAssets(): void
    {
        wp_enqueue_style('simple-separator-editor', get_template_directory_uri() . '/resources/tiny/editor-style.css');
    }

    public function enqueueFrontendAssets(): void
    {
        wp_enqueue_style('simple-separator-frontend', get_template_directory_uri() . '/resources/tiny/frontend-style.css');
    }
}
