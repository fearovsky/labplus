<?php

namespace App\View\Composers;

use App\Services\TestimonialService;
use Roots\Acorn\View\Composer;

class ArchiveComposer extends Composer
{
    private string $postType;


    public function __construct()
    {
        $this->postType = get_post_type();
    }

    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'archive',
    ];

    /**
     * Data to be passed to the view.
     *
     * @return array
     */
    public function with()
    {
        return [
            'hero' => $this->getHero(),
        ];
    }

    private function getHero(): array
    {
        switch ($this->postType) {
            case 'post':
                return [
                    'title' => __('Blog', 'labplus'),
                    'description' => __('Latest news and updates', 'labplus'),
                ];
            case 'page':
                return [
                    'title' => __('Pages', 'labplus'),
                    'description' => __('Browse our pages', 'labplus'),
                ];
            case 'case_study':
                $testimonialService = app(TestimonialService::class);
                $testimonials = get_field('caseTestimonials', 'option') ?: [];
                if (!empty($testimonials)) {
                    $testimonials = array_map([$testimonialService, 'getTestiomonialData'], $testimonials);
                }

                return [
                    'title' => get_field('caseHeading', 'option') ?: __('Case Studies', 'labplus'),
                    'content' => get_field('caseContent', 'option') ?: __('Discover how labs and healthcare providers benefited from partnering with Labplus.', 'labplus'),
                    'button' => get_field('caseLink', 'option') ?: [],
                    'testimonials' => $testimonials,
                ];
            default:
                return [
                    'title' => get_the_archive_title(),
                    'description' => get_the_archive_description(),
                ];
        }
    }
}
