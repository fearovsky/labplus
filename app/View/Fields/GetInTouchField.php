<?php

namespace App\View\Fields;

class GetInTouchField extends BaseField
{
    private string $title;
    private string $content;
    private ?array $button;
    private ?array $image;
    private string $titleImage;
    private string $contentImage;
    private ?array $links = null;

    public function __invoke(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'button' => $this->button,
            'image' => $this->image,
            'titleImage' => $this->titleImage,
            'contentImage' => $this->contentImage,
            'links' => $this->links,
        ];
    }

    protected function proccessFields(): void
    {
        $this->title = $this->getTitle();
        $this->content = $this->getContent();
        $this->button = $this->getButton();
        $this->image = $this->getImage();
        $this->titleImage = $this->getTitleImage();
        $this->contentImage = $this->getContentImage();
        $this->links = $this->getLinks();
    }

    private function getTitle(): string
    {
        return $this->field['title'];
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

    private function getImage(): ?array
    {
        $image = $this->field['image'] ?? null;
        if (empty($image)) {
            return null;
        }

        return $this->getImageBySize($image, 'full');
    }

    private function getTitleImage(): string
    {
        return $this->field['titleImage'];
    }

    private function getContentImage(): string
    {
        return $this->field['contentImage'];
    }

    private function getLinks(): ?array
    {
        $links = $this->field['links'] ?? null;
        if (empty($links)) {
            return null;
        }

        return $links;
    }
}
