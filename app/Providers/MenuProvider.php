<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        add_filter('wp_nav_menu_objects', [$this, 'filterMenuItems'], 10, 2);
        add_filter('wp_nav_menu_items', [$this, 'addNavItem'], 10, 2);
    }

    /**
     * Filter menu items to add custom classes.
     *
     * @param array $items
     * @param \WP_Term $menu
     * @return array
     */
    public function filterMenuItems(array $items, $menu): array
    {
        if ($menu->theme_location !== 'primary_navigation') {
            return $items;
        }


        foreach ($items as &$item) {
            if ($item->menu_item_parent == 0) {
                continue;
            }

            $icon = get_field('icon', $item);
            if (!$icon) {
                continue;
            }

            $item->title = $this->createExtendedItemAsTitle($item, $icon);
        }

        return $items;
    }

    private function createExtendedItemAsTitle($item, $icon)
    {
        return view('components.menu-item', [
            'item' => $item,
            'icon' => $icon,
        ])->render();
    }

    public function addNavItem($items, $args)
    {
        if ($args->theme_location !== 'primary_navigation') {
            return $items;
        }

        $newItem = view('partials.nav.menu-item')->render();
        $lastLiStart = strrpos($items, '<li');

        if ($lastLiStart !== false) {
            $items = substr_replace($items, $newItem, $lastLiStart, 0);
        } else {
            $items .= $newItem;
        }

        return $items;
    }
}
