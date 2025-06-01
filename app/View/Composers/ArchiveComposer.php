<?php

namespace App\View\Composers;

use App\Services\LogosService;
use Roots\Acorn\View\Composer;
use App\Services\ArchiveService;
use App\Services\TaxonomyService;
use App\PostType\CaseStudyPostType;
use App\Services\TestimonialService;
use App\Taxonomy\CaseStudyCategoryTaxonomy;

class ArchiveComposer extends Composer
{
    private string $postType;
    private ArchiveService $archiveService;


    public function __construct()
    {
        $this->postType = get_post_type();
        $this->archiveService = app(ArchiveService::class);
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
            'partners' => $this->getPartners(),
            'heading' => $this->getHeading(),
            'terms' => $this->getTerms(),
            'items' => $this->getItems(),
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

    private function getPartners()
    {
        $logoServices = app(LogosService::class);

        switch ($this->postType) {
            case 'case_study':
                $partners = get_field('casePartners', 'option') ?: [];
                if (empty($partners)) {
                    return [];
                }

                return $logoServices->getLogosByTaxonomy($partners, 'logoLight');
            case 'post':
                return get_field('blogPartners', 'option') ?: [];
            default:
                return [];
        }
    }

    private function getHeading(): string
    {
        switch ($this->postType) {
            case 'post':
                return __('Blog', 'labplus');
            case 'page':
                return __('Pages', 'labplus');
            case 'case_study':
                return __('Explore case studies', 'labplus');
            default:
                return get_the_archive_title();
        }
    }

    private function getTerms(): array
    {
        $taxonomyService = app(TaxonomyService::class);

        switch ($this->postType) {
            case 'post':
                return get_terms([
                    'taxonomy' => 'category',
                    'hide_empty' => true,
                ]);
            case 'case_study':
                return [
                    'taxonomy' => CaseStudyCategoryTaxonomy::getTaxonomy(),
                    'terms' => $taxonomyService->getAllAndAddGlobalTerms(
                        CaseStudyCategoryTaxonomy::getTaxonomy()
                    )
                ];
            default:
                return [];
        }
    }

    private function getItems(): array
    {
        switch ($this->postType) {
            case 'post':
                return get_posts([
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                ]);
            case CaseStudyPostType::getPostType():
                return $this->archiveService->getCaseStudyPosts();
            default:
                return [];
        }
    }
}
