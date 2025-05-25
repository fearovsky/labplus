<?php

namespace App\View\Fields;

class BenefitsOverviewField extends BaseField
{
    private ?string $preheading;
    private string $heading;
    private string $content;
    private ?array $link;
    private array $boxes;

    public function __invoke(): array
    {
        return [
            'preheading' => $this->preheading,
            'heading' => $this->heading,
            'content' => $this->content,
            'link' => $this->link,
            'boxes' => $this->boxes,
        ];
    }

    protected function proccessFields(): void
    {
        $this->preheading = $this->getPreHeading();
        $this->heading = $this->getHeading();
        $this->content = $this->getContent();
        $this->link = $this->getLink();
        $this->boxes = $this->getBoxes();
    }

    private function getPreHeading(): ?string
    {
        $preheading = $this->field['preheading'] ?? null;
        if (empty($preheading)) {
            return null;
        }

        return wp_kses_post($preheading);
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getContent(): string
    {
        $content = $this->field['content'] ?? '';
        if (empty($content)) {
            return '';
        }

        return wp_kses_post($content);
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

    private function getBoxes(): array
    {
        $boxes = $this->field['boxes'] ?? [];
        if (empty($boxes)) {
            return [];
        }

        return array_map(function ($box) {
            return [
                'icon' => $this->getImageBySize($box['icon'] ?? null, 'large'),
                'title' => wp_kses_post($box['title'] ?? ''),
                'content' => wp_kses_post($box['content'] ?? ''),
            ];
        }, $boxes);
    }
}
