<?php

namespace App\PostType;

class PatientStoryPostType extends BasePostType
{
    public static function getPostType()
    {
        return 'patient_story';
    }

    public function getLabels()
    {
        return [
            'name' => __('Patient Stories', 'lab'),
            'singular_name' => __('Patient Story', 'lab'),
            'menu_name' => __('Patient Stories', 'lab'),
            'add_new' => __('Add New', 'lab'),
            'add_new_item' => __('Add New Patient Story', 'lab'),
            'edit_item' => __('Edit Patient Story', 'lab'),
            'new_item' => __('New Patient Story', 'lab'),
            'view_item' => __('View Patient Story', 'lab'),
            'search_items' => __('Search Patient Stories', 'lab'),
            'not_found' => __('No patient stories found', 'lab'),
            'not_found_in_trash' => __('No patient stories found in Trash', 'lab'),
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
            'menu_icon' => 'dashicons-format-aside',
        ];
    }
}
