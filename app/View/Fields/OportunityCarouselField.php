<?php

namespace App\View\Fields;

class OportunityCarouselField extends BaseField
{
    private string $heading;
    private array $image;
    private array $items;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'image' => $this->image,
            'items' => $this->items,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->image = $this->getFieldImage('image', 'large');
        $this->items = $this->getItems();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getItems(): array
    {
        $items = [];

        if (empty($this->field['items'])) {
            return $items;
        }

        foreach ($this->field['items'] as $item) {
            $items[] = [
                'title' => wp_kses_post($item['title'] ?? ''),
                'icon' => $item['icon'],
                'content' => wp_kses_post($item['content'] ?? ''),
            ];
        }

        return $items;
    }
}
