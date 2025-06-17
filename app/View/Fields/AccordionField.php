<?php

namespace App\View\Fields;

class AccordionField extends BaseField
{
    private string $heading;
    private string $imageSize;
    private ?string $video;
    private ?array $items;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'imageSize' => $this->imageSize,
            'video' => $this->video,
            'items' => $this->items,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->video = $this->getVideo();
        $this->imageSize = $this->getImageSize();
        $this->items = $this->getItems();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getVideo(): ?string
    {
        $video = $this->field['video'] ?? null;
        if (empty($video)) {
            return null;
        }

        return wp_kses_post($video);
    }

    private function getItems(): ?array
    {
        $items = $this->field['items'] ?? null;
        if (empty($items)) {
            return null;
        }

        return $this->transformItemsToAccordion($items);
    }

    private function transformItemsToAccordion(array $items): array
    {
        return array_map(function ($item) {
            return [
                'title' => wp_kses_post($item['title'] ?? ''),
                'content' => wp_kses_post($item['content'] ?? ''),
            ];
        }, $items);
    }

    private function getImageSize(): string
    {
        return $this->field['imageSize'] ?? 'std';
    }
}
