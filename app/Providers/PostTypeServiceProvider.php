<?php

namespace App\Providers;

use App\PostType\{
    BasePostType,
    TestimonialPostType,
    CaseStudyPostType,
    MemberPostType,
    LogoPostType
};
use Illuminate\Support\ServiceProvider;

class PostTypeServiceProvider extends ServiceProvider
{
    private array $postTypes = [
        TestimonialPostType::class,
        CaseStudyPostType::class,
        MemberPostType::class,
        LogoPostType::class,
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        add_action('init', [$this, 'loadAllPostType']);
    }

    public function loadAllPostType()
    {
        foreach ($this->postTypes as $postType) {
            if (!class_exists($postType) || !is_subclass_of($postType, BasePostType::class)) {
                continue;
            }

            $instance = new $postType();
            $instance->registerPostType();
        }
    }
}
