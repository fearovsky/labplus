<?php

namespace App\PostType;

class FaqPostType extends BasePostType
{
    public static function getPostType()
    {
        return 'faq';
    }

    public function getLabels()
    {
        return [
            'name' => __('FAQs', 'lab'),
            'singular_name' => __('FAQ', 'lab'),
            'menu_name' => __('FAQs', 'lab'),
            'add_new' => __('Add New', 'lab'),
            'add_new_item' => __('Add New FAQ', 'lab'),
            'edit_item' => __('Edit FAQ', 'lab'),
            'new_item' => __('New FAQ', 'lab'),
            'view_item' => __('View FAQ', 'lab'),
            'search_items' => __('Search FAQs', 'lab'),
            'not_found' => __('No FAQs found', 'lab'),
            'not_found_in_trash' => __('No FAQs found in Trash', 'lab'),
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
            'menu_icon' => 'dashicons-editor-help',
        ];
    }
}
