<?php

namespace App\Services;

class TaxonomyService
{
    public function getAllAndAddGlobalTerms(string $taxonomy, bool $searchForParam = false, ?string $param = null): array
    {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ]);

        if (is_wp_error($terms)) {
            return [];
        }

        array_unshift($terms, (object) [
            'term_id' => 0,
            'name' => __('All', 'labplus'),
        ]);

        return $this->getWithActiveElement($terms, $param);
    }

    private function getWithActiveElement(array $terms, ?string $param): array
    {
        $outputItems = [];

        foreach ($terms as $term) {
            $outputItems[] = [
                'id' => $term->term_id,
                'name' => $term->name,
                'active' => $param === null && $term->term_id == 0 ||
                    $param !== null && $term->term_id == $param,
            ];
        }

        return $outputItems;
    }
}
