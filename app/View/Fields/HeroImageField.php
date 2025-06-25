<?php

namespace App\View\Fields;

class HeroImageField extends BaseField
{
    private string $heading;
    private string $content;
    private ?array $button;
    private ?string $image;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'content' => $this->content,
            'button' => $this->button,
            'image' => $this->image,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->content = $this->getContent();
        $this->button = $this->getButton();

        $this->image = $this->getImage();

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
                'title' => $this->field['button']['title'],
                'url' => $this->field['button']['url'],
                'target' => $this->field['button']['target'] ?? '_self',
            ];
        }

        return null;
    }

    private function getImage(): ?string
    {
        $image = $this->field['image'] ?? null;
        if (empty($image)) {
            return null;
        }

        return wp_get_attachment_image($image['ID'], 'full', false, [
            'class' => 'hero-section-image-thumbnail__image',
        ]);
    }
}
