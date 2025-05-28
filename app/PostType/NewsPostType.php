<?php

namespace App\PostType;

class NewsPostType extends BasePostType
{
    public static function getPostType()
    {
        return 'news';
    }

    public function getLabels()
    {
        return [
            'name' => __('News', 'lab'),
            'singular_name' => __('News Item', 'lab'),
            'menu_name' => __('News', 'lab'),
            'name_admin_bar' => __('News Item', 'lab'),
            'add_new' => __('Add New', 'lab'),
            'add_new_item' => __('Add New News Item', 'lab'),
            'edit_item' => __('Edit News Item', 'lab'),
            'new_item' => __('New News Item', 'lab'),
            'view_item' => __('View News Item', 'lab'),
            'all_items' => __('All News Items', 'lab'),
            'search_items' => __('Search News Items', 'lab'),
            'not_found' => __('No news items found.', 'lab'),
            'not_found_in_trash' => __('No news items found in Trash.', 'lab'),
        ];
    }

    public function getArgs()
    {
        return [
            'labels' => $this->getLabels(),
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'supports' => ['title'],
            'menu_icon' => 'dashicons-media-document',
        ];
    }
}
