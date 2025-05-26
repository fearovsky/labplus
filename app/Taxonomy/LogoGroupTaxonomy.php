<?php

namespace App\Taxonomy;

use App\PostType\LogoPostType;

class LogoGroupTaxonomy extends BaseTaxonomy
{
    public static function getTaxonomy()
    {
        return 'logo_group';
    }

    public function getPostType()
    {
        return LogoPostType::getPostType();
    }

    public function getLabels()
    {
        return [
            'name' => __('Logo Groups', 'labplus'),
            'singular_name' => __('Logo Group', 'labplus'),
            'menu_name' => __('Logo Groups', 'labplus'),
            'all_items' => __('All Logo Groups', 'labplus'),
            'edit_item' => __('Edit Logo Group', 'labplus'),
            'view_item' => __('View Logo Group', 'labplus'),
            'update_item' => __('Update Logo Group', 'labplus'),
            'add_new_item' => __('Add New Logo Group', 'labplus'),
            'new_item_name' => __('New Logo Group Name', 'labplus'),
            'search_items' => __('Search Logo Groups', 'labplus'),
            'not_found' => __('No logo groups found', 'labplus'),
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
