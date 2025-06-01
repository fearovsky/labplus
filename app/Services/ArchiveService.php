<?php

namespace App\Services;

class ArchiveService
{
    public function getCaseStudyPosts(?int $termId = null)
    {
        global $wp_query;
        wp_die(var_dump(
            $wp_query
        ));

        $args = [
            'post_type' => 'case_study',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
        ];

        if ($termId) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'case_study_category',
                    'field' => 'term_id',
                    'terms' => $termId,
                ],
            ];
        }

        $query = new \WP_Query($args);

        return $query->have_posts() ? $this->prepareForCaseStudy($query->posts) : [];
    }

    public function prepareForCaseStudy(array $caseStudies): array
    {
        if (empty($caseStudies)) {
            return [];
        }

        $caseStudiesOutput = [];

        foreach ($caseStudies as $caseStudy) {
            $caseStudiesOutput[] = [
                'title' => get_the_title($caseStudy),
                'excerpt' => get_the_excerpt($caseStudy),
                'thumbnail' => get_the_post_thumbnail($caseStudy, 'full', [
                    'class' => 'archive-posts-item__thumbnail',
                ]),
                'permalink' => get_permalink($caseStudy),
            ];
        }

        return $caseStudiesOutput;
    }
}
