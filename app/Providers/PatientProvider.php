<?php

namespace App\Providers;

use App\PostType\PatientStoryPostType;
use Illuminate\Support\ServiceProvider;

class PatientProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // add_action('wp_footer', [$this, 'generateModals']);
    }

    public function generateModals()
    {
        if (!is_singular(PatientStoryPostType::getPostType())) {
            return;
        }

        $healthRaport = get_field('health_raport');

    }
}


