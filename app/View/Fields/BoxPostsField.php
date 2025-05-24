<?php

namespace App\View\Fields;

use App\Services\PostService;

class BoxPostsField extends BaseField
{
    private string $heading;
    private array $posts;
    private ?array $link;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'posts' => $this->posts,
            'link' => $this->link,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->posts = $this->getPosts();
        $this->link = $this->getLink();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getPosts(): array
    {
        $posts = $this->field['posts'] ?? [];
        if (empty($posts)) {
            return [];
        }

        $service = app(PostService::class);

        return $service->transformListToBoxes($posts);
    }

    private function getLink(): ?array
    {
        $link = $this->field['link'] ?? null;
        if (empty($link)) {
            return null;
        }

        return [
            'url' => esc_url($link['url'] ?? ''),
            'title' => esc_html($link['title'] ?? ''),
            'target' => $link['target'] ?? '_self',
        ];
    }
}
