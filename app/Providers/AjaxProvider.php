<?php

namespace App\Providers;

use WP_Query;

use WP_REST_Response;
use App\Services\ArchiveService;
use Illuminate\Support\ServiceProvider;

class AjaxProvider extends ServiceProvider
{
    public function boot(): void
    {
        add_action('rest_api_init', function () {
            register_rest_route('labplus/v1', '/load-posts', [
                'methods' => 'POST',
                'callback' => [$this, 'loadPosts'],
                'permission_callback' => '__return_true',
            ]);
        });
    }

    public function loadPosts(\WP_REST_Request $request): WP_REST_Response
    {
        $postType = $request->get_param('posttype') ?: 'post';
        if (!post_type_exists($postType)) {
            return new WP_REST_Response(['error' => 'Invalid post type'], 400);
        }

        $taxonomy = $request->get_param('taxonomy') ?: 'category';
        if (!taxonomy_exists($taxonomy)) {
            return new WP_REST_Response(['error' => 'Invalid taxonomy'], 400);
        }

        $term = absint($request->get_param('term') ?: 0);
        // $nextPage = absint($request->get_param('paged') ?: 1) + 1;

        $args = [
            'post_type' => $postType,
            // 'paged' => $nextPage,
            'tax_query' => [
                [
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $term,
                ],
            ],
        ];

        if ($term <= 0) {
            unset($args['tax_query']);
        }


        $query = new WP_Query($args);
        if (!$query->have_posts()) {
            return new WP_REST_Response([
                'message' => view(
                    'partials.alert',
                    [
                        'content' => __('No more posts found.', 'labplus'),
                        'pagination' => null,
                        'items' => []
                    ]
                )->render(),
            ], 204);
        }

        $archiveService = app(ArchiveService::class);
        $posts = $archiveService->prepareForCaseStudy($query->posts);
        $posts = array_map(function ($post) {
            return view(
                'partials.archive.case.archive-case-item',
                ['item' => $post]
            )->render();
        }, $posts);

        return new WP_REST_Response([
            'items' => $posts,
            'pagination' => view(
                'partials.archive.pagination',
                [
                    'pagination' => $archiveService->getPagination($query)
                ]
            )->render(),
            'content' => 'posts_found',
        ], 200);
    }
}
