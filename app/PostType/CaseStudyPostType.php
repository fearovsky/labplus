<?php

namespace App\PostType;

class CaseStudyPostType extends BasePostType
{
    public static function getPostType()
    {
        return 'case_study';
    }

    public function getLabels()
    {
        return [
            'name' => __('Case Studies', 'labplus'),
            'singular_name' => __('Case Study', 'labplus'),
            'add_new' => __('Add New', 'labplus'),
            'add_new_item' => __('Add New Case Study', 'labplus'),
            'edit_item' => __('Edit Case Study', 'labplus'),
            'new_item' => __('New Case Study', 'labplus'),
            'view_item' => __('View Case Study', 'labplus'),
            'search_items' => __('Search Case Studies', 'labplus'),
            'not_found' => __('No case studies found', 'labplus'),
            'not_found_in_trash' => __('No case studies found in Trash', 'labplus'),
        ];
    }

    public function getArgs()
    {
        return [
            'labels' => $this->getLabels(),
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'excerpt', 'thumbnail'],
            'menu_icon' => 'dashicons-portfolio',
        ];
    }
}
