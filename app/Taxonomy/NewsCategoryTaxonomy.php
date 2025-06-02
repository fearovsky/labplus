<?php

namespace App\Taxonomy;

use App\PostType\NewsPostType;

class NewsCategoryTaxonomy extends BaseTaxonomy
{
    public static function getTaxonomy()
    {
        return 'news_category';
    }

    public function getPostType()
    {
        return NewsPostType::getPostType();
    }

    public function getLabels()
    {
        return [
            'name' => __('News Categories', 'labplus'),
            'singular_name' => __('News Category', 'labplus'),
            'search_items' => __('Search News Categories', 'labplus'),
            'all_items' => __('All News Categories', 'labplus'),
            'parent_item' => __('Parent News Category', 'labplus'),
            'parent_item_colon' => __('Parent News Category:', 'labplus'),
            'edit_item' => __('Edit News Category', 'labplus'),
            'update_item' => __('Update News Category', 'labplus'),
            'add_new_item' => __('Add New News Category', 'labplus'),
            'new_item_name' => __('New News Category Name', 'labplus'),
            'menu_name' => __('News Categories', 'labplus'),
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
