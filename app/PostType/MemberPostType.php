<?php

namespace App\PostType;

class MemberPostType extends BasePostType
{
    public static function getPostType()
    {
        return 'member';
    }

    public function getLabels()
    {
        return [
            'name' => __('Members', 'labplus'),
            'singular_name' => __('Member', 'labplus'),
            'add_new' => __('Add New', 'labplus'),
            'add_new_item' => __('Add New Member', 'labplus'),
            'edit_item' => __('Edit Member', 'labplus'),
            'new_item' => __('New Member', 'labplus'),
            'view_item' => __('View Member', 'labplus'),
            'search_items' => __('Search Members', 'labplus'),
            'not_found' => __('No members found', 'labplus'),
            'not_found_in_trash' => __('No members found in Trash', 'labplus'),
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
            'menu_icon' => 'dashicons-groups',
        ];
    }
}
