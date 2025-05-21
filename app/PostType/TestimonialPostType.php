<?php

namespace App\PostType;

class TestimonialPostType extends BasePostType
{
    public static function getPostType()
    {
        return 'testimonial';
    }

    public function getLabels()
    {
        return [
            'name' => __('Testimonials', 'labplus'),
            'singular_name' => __('Testimonial', 'labplus'),
            'add_new' => __('Add New', 'labplus'),
            'add_new_item' => __('Add New Testimonial', 'labplus'),
            'edit_item' => __('Edit Testimonial', 'labplus'),
            'new_item' => __('New Testimonial', 'labplus'),
            'view_item' => __('View Testimonial', 'labplus'),
            'search_items' => __('Search Testimonials', 'labplus'),
            'not_found' => __('No testimonials found', 'labplus'),
            'not_found_in_trash' => __('No testimonials found in Trash', 'labplus'),
        ];
    }

    public function getArgs(): array
    {
        return [
            'labels' => $this->getLabels(),
            'public' => false,
            'has_archive' => false,
            'show_ui' => true,
            'supports' => ['title'],
            'menu_icon' => 'dashicons-testimonial',
        ];
    }
}
