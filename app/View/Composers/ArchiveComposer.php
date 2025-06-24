<?php

namespace App\View\Composers;

use App\Services\NewsService;
use App\Services\LogosService;
use Roots\Acorn\View\Composer;
use App\Services\ArchiveService;
use App\Services\ResourceService;
use App\Services\TaxonomyService;
use App\PostType\CaseStudyPostType;
use App\Services\CasestudyService;
use App\Services\TestimonialService;
use App\Taxonomy\NewsCategoryTaxonomy;
use App\Taxonomy\ResourceCategoryTaxonomy;
use App\Taxonomy\CaseStudyCategoryTaxonomy;

class ArchiveComposer extends Composer
{
    private string $postType;
    private ArchiveService $archiveService;
    private TaxonomyService $taxonomyService;


    public function __construct()
    {
        $this->postType = $this->getPostType();
        $this->archiveService = app(ArchiveService::class);
        $this->taxonomyService = app(TaxonomyService::class);
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
            'pagination' => $this->getPagination(),
            'postType' => $this->postType,
            'paged' => max(1, get_query_var('paged')),
            'maxPages' => $this->getMaxNumPages(),
        ];
    }

    private function getPostType()
    {
        global $wp_query;

        if (isset($wp_query->query['post_type']) && is_string($wp_query->query['post_type'])) {
            return $wp_query->query['post_type'];
        }

        return 'post';
    }

    private function getHero(): array
    {
        switch ($this->postType) {
            case 'page':
                return [
                    'title' => __('Pages', 'labplus'),
                    'description' => __('Browse our pages', 'labplus'),
                ];
            case 'patient_story':
                return [
                    'title' => get_field('patientHeading', 'option') ?: __('Authentic use cases, responsibly shared', 'labplus'),
                    'content' => get_field('patientContent', 'option') ?: __('Physician-verified patient stories1 highlighting the real-world value of LabTest Checker by Labplus®.', 'labplus'),
                    'button' => get_field('patientLink', 'option') ?: [],
                    'video' => get_field('patientVideo', 'option') ?: null,
                    'boxes' => get_field('patientBoxes', 'option') ?: [],
                ];
            case 'resource':
                $resourceService = app(ResourceService::class);
                $resourcePost = get_field('resourceFeatured', 'option') ?: null;

                return [
                    'title' => get_field('resourceHeading', 'option') ?: __('Resources', 'labplus'),
                    'content' => get_field('resourceContent', 'option') ?: __('Explore our collection of downloadable guides, in-depth articles, and industry reports.', 'labplus'),
                    'button' => get_field('resourceLink', 'option') ?: [],
                    'post' => $resourcePost ? $resourceService->getPost($resourcePost, 'hero-section-image-post-box__thumbnail-image') : [],
                    'fileToDownload' => get_field('downloadFile', $resourcePost) ?: null,
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
            case 'news':
                $newsService = app(NewsService::class);
                $news = get_field('newsFeatured', 'option') ?: [];

                return [
                    'title' => get_field('newsHeading', 'option') ?: __('News', 'labplus'),
                    'content' => get_field('newsContent', 'option') ?: __('Stay informed with our latest product updates, press releases, and innovations shaping the future of lab testing.', 'labplus'),
                    'button' => get_field('newsLink', 'option') ?: [],
                    'post' => $news ? $newsService->getPost($news, 'hero-section-image-post-box__thumbnail-image') : [],
                ];
            default:
                return [];
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

                return $logoServices->getLogosByTaxonomy($partners, 'logoDark');
            case 'post':
                return get_field('blogPartners', 'option') ?: [];
            default:
                return [];
        }
    }

    private function getHeading(): ?string
    {
        switch ($this->postType) {
            case 'post':
                return __('Blog', 'labplus');
            case 'page':
                return __('Pages', 'labplus');
            case 'case_study':
                return __('Explore case studies', 'labplus');
            default:
                return null;
        }
    }

    private function getTerms(): array
    {
        switch ($this->postType) {
            case 'post':
                return get_terms([
                    'taxonomy' => 'category',
                    'hide_empty' => true,
                ]);
            case 'case_study':
                return [
                    'taxonomy' => CaseStudyCategoryTaxonomy::getTaxonomy(),
                    'terms' => $this->taxonomyService->getAllAndAddGlobalTerms(
                        CaseStudyCategoryTaxonomy::getTaxonomy()
                    )
                ];
            case 'news':
                return [
                    'taxonomy' => NewsCategoryTaxonomy::getTaxonomy(),
                    'terms' => $this->taxonomyService->getAllAndAddGlobalTerms(
                        NewsCategoryTaxonomy::getTaxonomy()
                    )
                ];
            case 'resource':
                return [
                    'taxonomy' => ResourceCategoryTaxonomy::getTaxonomy(),
                    'terms' => $this->taxonomyService->getAllAndAddGlobalTerms(
                        ResourceCategoryTaxonomy::getTaxonomy()
                    )
                ];
            default:
                return [];
        }
    }

    private function getItems(): array
    {
        global $wp_query;
        if (!$wp_query->have_posts()) {
            return [];
        }

        return $this->archiveService->prepareForBoxesAndTerms(
            $wp_query->posts,
            $this->postType
        );
    }

    private function getPagination(): array
    {
        global $wp_query;
        if (!$wp_query->max_num_pages) {
            return [];
        }

        $pagination = paginate_links([
            'total' => $wp_query->max_num_pages,
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

    private function getMaxNumPages(): int
    {
        global $wp_query;

        return max(1, $wp_query->max_num_pages);
    }
}
