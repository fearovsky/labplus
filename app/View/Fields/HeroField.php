<?php

namespace App\View\Fields;

use App\Services\LogosService;

class HeroField extends BaseField
{
    private ?array $background;
    private string $heading;
    private ?string $content = null;
    private ?string $video = null;
    private string $type = 'content';
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
            'type' => $this->type,
            'video' => $this->video,
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
        $this->type = $this->getType();
        $this->video = $this->getVideo();
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

        $logoServices = app(LogosService::class);

        return [
            'title' => $title,
            'items' => $logoServices->getLogosByTaxonomy($this->field['logostaxonomy'], 'logoLight'),
        ];
    }

    private function getType(): string
    {
        return $this->field['type'] ?? 'image';
    }

    private function getVideo(): ?string
    {
        return $this->field['video'] ?? null;
    }
}
