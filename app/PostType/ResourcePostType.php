<?php

namespace App\PostType;

class ResourcePostType extends BasePostType
{
    public static function getPostType()
    {
        return 'resource';
    }

    public function getLabels()
    {
        return [
            'name' => __('Resources', 'lab'),
            'singular_name' => __('Resource', 'lab'),
            'menu_name' => __('Resources', 'lab'),
            'name_admin_bar' => __('Resource', 'lab'),
            'add_new' => __('Add New', 'lab'),
            'add_new_item' => __('Add New Resource', 'lab'),
            'edit_item' => __('Edit Resource', 'lab'),
            'new_item' => __('New Resource', 'lab'),
            'view_item' => __('View Resource', 'lab'),
            'all_items' => __('All Resources', 'lab'),
            'search_items' => __('Search Resources', 'lab'),
            'not_found' => __('No resources found.', 'lab'),
            'not_found_in_trash' => __('No resources found in Trash.', 'lab'),
        ];
    }

    public function getArgs()
    {
        return [
            'labels' => $this->getLabels(),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'supports' => ['title', 'excerpt', 'thumbnail'],
            'menu_icon' => 'dashicons-portfolio',
        ];
    }
}
