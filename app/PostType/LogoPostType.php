<?php

namespace App\PostType;

class LogoPostType extends BasePostType
{
    public static function getPostType()
    {
        return 'logo';
    }

    public function getLabels()
    {
        return [
            'name' => __('Logos', 'labplus'),
            'singular_name' => __('Logo', 'labplus'),
            'menu_name' => __('Logos', 'labplus'),
            'add_new' => __('Add New', 'labplus'),
            'add_new_item' => __('Add New Logo', 'labplus'),
            'edit_item' => __('Edit Logo', 'labplus'),
            'new_item' => __('New Logo', 'labplus'),
            'view_item' => __('View Logo', 'labplus'),
            'search_items' => __('Search Logos', 'labplus'),
            'not_found' => __('No logos found', 'labplus'),
            'not_found_in_trash' => __('No logos found in Trash', 'labplus'),
        ];
    }

    public function getArgs()
    {
        return [
            'labels' => $this->getLabels(),
            'public' => false,
            'has_archive' => false,
            'show_ui' => true,
            'supports' => ['title'],
            'menu_icon' => 'dashicons-format-image',
        ];
    }
}
