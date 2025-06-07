<?php

namespace App\View\Fields;

class AccordionField extends BaseField
{
    private string $heading;
    private string $imageSize;
    private ?array $image;
    private ?array $items;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'imageSize' => $this->imageSize,
            'image' => $this->image,
            'items' => $this->items,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->image = $this->getFieldImage('image', 'full');
        $this->imageSize = $this->getImageSize();
        $this->items = $this->getItems();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
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
