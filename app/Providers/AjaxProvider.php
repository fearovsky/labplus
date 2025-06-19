<?php

namespace App\Providers;

use WP_Query;

use WP_REST_Response;
use App\PostType\MemberPostType;
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

            register_rest_route('labplus/v1', '/load-person', [
                'methods' => 'POST',
                'callback' => [$this, 'loadPerson'],
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

        $args = [
            'post_type' => $postType,
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
            ], 200);
        }

        $archiveService = app(ArchiveService::class);
        $posts = $archiveService->preparedBoxesWithTerms($postType, $query->posts);
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

    public function loadPerson(\WP_REST_Request $request): WP_REST_Response
    {
        $id = absint($request->get_param('personId'));
        if ($id <= 0) {
            return new WP_REST_Response(['error' => 'Invalid ID'], 400);
        }

        $person = get_post($id);
        if (!$person || $person->post_type !== MemberPostType::getPostType()) {
            return new WP_REST_Response(['error' => 'Person not found'], 404);
        }

        $content = view(
            'builder.advanced.fields.subfields.our-team-box',
            [
                'name' => get_field('name', $id),
                'role' => get_field('role', $id),
                'achievements' => get_field('achievements', $id),
                'socialmedia' => get_field('social-media', $id),
                'content' => get_field('content', $person)
            ]
        )->render();

        return new WP_REST_Response([
            'content' => $content
        ], 200);
    }
}
