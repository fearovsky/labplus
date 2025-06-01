<?php

namespace App\Taxonomy;

use App\PostType\CaseStudyPostType;

class CaseStudyCategoryTaxonomy extends BaseTaxonomy
{
    public static function getTaxonomy()
    {
        return 'case_category';
    }

    public function getPostType()
    {
        return CaseStudyPostType::getPostType();
    }

    public function getLabels()
    {
        return [
            'name' => __('Case Study Categories', 'labplus'),
            'singular_name' => __('Case Study Category', 'labplus'),
            'menu_name' => __('Case Study Categories', 'labplus'),
            'all_items' => __('All Case Study Categories', 'labplus'),
            'edit_item' => __('Edit Case Study Category', 'labplus'),
            'view_item' => __('View Case Study Category', 'labplus'),
            'update_item' => __('Update Case Study Category', 'labplus'),
            'add_new_item' => __('Add New Case Study Category', 'labplus'),
            'new_item_name' => __('New Case Study Category Name', 'labplus'),
            'search_items' => __('Search Case Study Categories', 'labplus'),
            'not_found' => __('No case study categories found', 'labplus'),
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
