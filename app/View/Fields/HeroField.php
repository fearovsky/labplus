<?php

namespace App\View\Fields;

class HeroField extends BaseField
{
    private ?array $background;
    private string $heading;
    private string $content;
    private ?array $button;
    private ?array $image;
    private ?array $logos = null;

    public function __invoke(): array
    {
        return [
            'background' => $this->background,
            'heading' => $this->heading,
            'content' => $this->content,
            'button' => $this->button,
            'image' => $this->image,
            'logos' => $this->logos,
        ];
    }

    protected function proccessFields(): void
    {
        $this->background = $this->getFieldImage('background', 'full');
        $this->heading = $this->getHeading();
        $this->content = $this->getContent();
        $this->button = $this->getButton();
        $this->image = $this->getFieldImage('image', 'large');
        $this->logos = $this->getLogos();
    }

    private function getHeading(): string
    {
        return $this->field['heading'];
    }

    private function getContent(): string
    {
        return $this->field['content'];
    }

    private function getButton(): ?array
    {
        if (!empty($this->field['button'])) {
            return [
                'text' => $this->field['button']['title'],
                'url' => $this->field['button']['url'],
                'target' => $this->field['button']['target'] ?? '_self',
            ];
        }

        return null;
    }

    private function getLogos(): ?array
    {
        $title = $this->field['logosTitleSection'] ?? null;
        if ((empty($title))) {
            return null;
        }

        return [
            'title' => $title,
            'images' => $this->processLogos($this->field['logos']),
        ];
    }

    private function processLogos(?array $logos)
    {
        if (empty($logos)) {
            return [];
        }

        return array_map(function ($logoImage) {
            return $this->getFieldImage('logos', 'large', $logoImage);
        }, array_keys($logos));
    }
}
