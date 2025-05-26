<?php

namespace App\Providers;

use App\Taxonomy\BaseTaxonomy;
use App\Taxonomy\LogoGroupTaxonomy;
use Illuminate\Support\ServiceProvider;

class TaxonomyServiceProvider extends ServiceProvider
{
    private array $taxonomies = [
        LogoGroupTaxonomy::class,
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        add_action('init', [$this, 'loadAllTaxonomies']);
    }

    public function loadAllTaxonomies()
    {
        foreach ($this->taxonomies as $taxonomy) {
            if (!class_exists($taxonomy) || !is_subclass_of($taxonomy, BaseTaxonomy::class)) {
                continue;
            }

            $instance = new $taxonomy();
            $instance->registerTaxonomy();
        }
    }
}
