<?php

namespace App\Providers;

use Roots\Acorn\Sage\SageServiceProvider;

use function Roots\bundle;

class ThemeServiceProvider extends SageServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->loadThemeHooks();
    }

    private function loadThemeHooks(): void
    {
        $this->disableGutenberg();
    }

    private function disableGutenberg(): void
    {
        add_filter('use_block_editor_for_post', '__return_false');
        add_filter('use_widgets_block_editor', '__return_false');

        add_action('wp_enqueue_scripts', [$this, 'handleEnqueueAssets'], 100);
        add_action('admin_menu', [$this, 'removePatternsFromNav'], 100);
    }

    public function removePatternsFromNav(): void
    {
        remove_submenu_page('themes.php', 'site-editor.php?p=/pattern');
    }

    public function handleEnqueueAssets(): void
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('global-styles');
        wp_dequeue_style('classic-theme-styles');

        // add localize
        wp_localize_script('sage/main.js', 'sage', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('sage_nonce'),
        ]);
    }
}
