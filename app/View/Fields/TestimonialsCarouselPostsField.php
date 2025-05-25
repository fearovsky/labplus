<?php

namespace App\View\Fields;

use App\Services\PostService;

class TestimonialsCarouselPostsField extends BaseField
{
    private string $heading;
    private array $testimonials;
    private ?string $resourceName;
    private string $resourceLinkText;
    private ?array $link;
    private array $posts;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'testimonials' => $this->testimonials,
            'resourceName' => $this->resourceName,
            'resourceLinkText' => $this->resourceLinkText,
            'posts' => $this->posts,
            'link' => $this->link,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->testimonials = $this->getTestimonials();
        $this->resourceName = $this->getResourceName();
        $this->resourceLinkText = $this->getResourceLinkText();
        $this->link = $this->getLink();
        $this->posts = $this->getPosts();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getTestimonials(): array
    {
        $testimonials = [];

        if (empty($this->field['testimonials'])) {
            return $testimonials;
        }

        foreach ($this->field['testimonials'] as $testimonial) {
            $testimonials[] = [
                'avatar' => $this->getImageBySize(get_field('avatar', $testimonial) ?? [], 'full'),
                'name' => wp_kses_post(get_field('name', $testimonial) ?? ''),
                'content' => wp_kses_post(get_field('content', $testimonial) ?? ''),

            ];
        }

        return $testimonials;
    }

    private function getResourceName(): ?string
    {
        return !empty($this->field['resourceName']) ? wp_kses_post($this->field['resourceName']) : null;
    }

    private function getResourceLinkText(): string
    {
        return wp_kses_post($this->field['resourceText'] ?? '');
    }

    private function getLink(): ?array
    {
        if (empty($this->field['link'])) {
            return null;
        }

        return [
            'url' => esc_url($this->field['link']['url'] ?? ''),
            'title' => wp_kses_post($this->field['link']['title'] ?? ''),
            'target' => $this->field['link']['target'] ?? '_self',
        ];
    }

    private function getPosts(): array
    {
        $posts = [];

        if (empty($this->field['posts'])) {
            return $posts;
        }

        $serviceClass = app()->make(PostService::class);

        return $serviceClass->transformListToBoxes($this->field['posts']);
    }
}
