<?php

namespace App\Providers;

use App\Taxonomy\{
    BaseTaxonomy,
    LogoGroupTaxonomy,
    CaseStudyCategoryTaxonomy,
    ResourceCategoryTaxonomy,
    NewsCategoryTaxonomy
};

use Illuminate\Support\ServiceProvider;

class TaxonomyServiceProvider extends ServiceProvider
{
    private array $taxonomies = [
        LogoGroupTaxonomy::class,
        NewsCategoryTaxonomy::class,
        ResourceCategoryTaxonomy::class,
        CaseStudyCategoryTaxonomy::class
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
