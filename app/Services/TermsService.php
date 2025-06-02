<?php

namespace App\Services;

class TermsService
{
    public function getPreparedTerms(array $terms)
    {
        return array_map(function ($term) {
            return [
                'name' => $term->name,
                'permalink' => get_term_link($term),
            ];
        }, $terms);
    }
}
