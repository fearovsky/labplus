<?php

namespace App\Taxonomy;

use App\PostType\ResourcePostType;

class ResourceCategoryTaxonomy extends BaseTaxonomy
{
    public static function getTaxonomy()
    {
        return 'resource_category';
    }

    public function getPostType()
    {
        return ResourcePostType::getPostType();
    }

    public function getLabels()
    {
        return [
            'name' => __('Resource Categories', 'labplus'),
            'singular_name' => __('Resource Category', 'labplus'),
            'search_items' => __('Search Resource Categories', 'labplus'),
            'all_items' => __('All Resource Categories', 'labplus'),
            'parent_item' => __('Parent Resource Category', 'labplus'),
            'parent_item_colon' => __('Parent Resource Category:', 'labplus'),
            'edit_item' => __('Edit Resource Category', 'labplus'),
            'update_item' => __('Update Resource Category', 'labplus'),
            'add_new_item' => __('Add New Resource Category', 'labplus'),
            'new_item_name' => __('New Resource Category Name', 'labplus'),
            'menu_name' => __('Resource Categories', 'labplus'),
        ];
    }

    public function getArgs()
    {
        return [
            'labels' => $this->getLabels(),
            'public' => false,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
        ];
    }
}
