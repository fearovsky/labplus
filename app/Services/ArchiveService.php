<?php

namespace App\Services;

class ArchiveService
{
    public function getCaseStudyPosts(?int $termId = null)
    {
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

    public function getPagination($query)
    {
        if (!$query->max_num_pages) {
            return [];
        }

        $pagination = paginate_links([
            'total' => $query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'prev_text' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M21.3749 11.9991C21.3749 12.2974 21.2564 12.5836 21.0454 12.7946C20.8344 13.0055 20.5483 13.1241 20.2499 13.1241H6.46866L11.2987 17.9531C11.51 18.1645 11.6287 18.4511 11.6287 18.75C11.6287 19.0489 11.51 19.3355 11.2987 19.5469C11.0873 19.7582 10.8007 19.877 10.5018 19.877C10.2029 19.877 9.91625 19.7582 9.70491 19.5469L2.95491 12.7969C2.85003 12.6924 2.76681 12.5682 2.71003 12.4314C2.65325 12.2947 2.62402 12.1481 2.62402 12C2.62402 11.8519 2.65325 11.7053 2.71003 11.5686C2.76681 11.4318 2.85003 11.3076 2.95491 11.2031L9.70491 4.45312C9.80956 4.34848 9.93379 4.26547 10.0705 4.20883C10.2072 4.1522 10.3538 4.12305 10.5018 4.12305C10.6498 4.12305 10.7963 4.1522 10.9331 4.20883C11.0698 4.26547 11.194 4.34848 11.2987 4.45312C11.4033 4.55777 11.4863 4.682 11.543 4.81873C11.5996 4.95546 11.6287 5.102 11.6287 5.25C11.6287 5.39799 11.5996 5.54454 11.543 5.68126C11.4863 5.81799 11.4033 5.94223 11.2987 6.04687L6.46866 10.8741H20.2499C20.5483 10.8741 20.8344 10.9926 21.0454 11.2036C21.2564 11.4145 21.3749 11.7007 21.3749 11.9991Z" fill="#1F5A57"/> </svg>',
            'next_text' => '<svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M19.0459 8.79586L12.2959 15.5459C12.0846 15.7572 11.7979 15.8759 11.4991 15.8759C11.2002 15.8759 10.9135 15.7572 10.7022 15.5459C10.4908 15.3345 10.3721 15.0479 10.3721 14.749C10.3721 14.4501 10.4908 14.1635 10.7022 13.9521L15.5312 9.12492H1.75C1.45163 9.12492 1.16548 9.00639 0.954505 8.79541C0.743526 8.58444 0.625 8.29829 0.625 7.99992C0.625 7.70155 0.743526 7.4154 0.954505 7.20442C1.16548 6.99345 1.45163 6.87492 1.75 6.87492H15.5312L10.7041 2.04492C10.4927 1.83358 10.374 1.54693 10.374 1.24804C10.374 0.949159 10.4927 0.662514 10.7041 0.45117C10.9154 0.239826 11.2021 0.121094 11.5009 0.121094C11.7998 0.121094 12.0865 0.239826 12.2978 0.45117L19.0478 7.20117C19.1527 7.30583 19.2359 7.43018 19.2926 7.56707C19.3493 7.70397 19.3784 7.85073 19.3782 7.9989C19.3781 8.14708 19.3486 8.29377 19.2916 8.43053C19.2346 8.5673 19.1511 8.69145 19.0459 8.79586Z" fill="#1F5A57"/> </svg>',
            'type' => 'array',
        ]);


        if (empty($pagination)) {
            return [];
        }

        return $pagination;
    }
}
