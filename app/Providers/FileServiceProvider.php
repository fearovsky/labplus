<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        add_filter('upload_mimes', [$this, 'enableSvgUpload']);
    }

    public function enableSvgUpload($mimes)
    {
        if (current_user_can('administrator')) {
            $mimes['svg'] = 'image/svg+xml';
            $mimes['svgz'] = 'image/svg+xml';
        }

        return $mimes;
    }
}
