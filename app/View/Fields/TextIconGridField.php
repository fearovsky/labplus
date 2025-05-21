<?php

namespace App\View\Fields;

class TextIconGridField extends BaseField
{
    private string $heading;
    private array $items;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'items' => $this->items,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->items = $this->getItems();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getItems(): array
    {
        $items = $this->field['items'] ?? [];
        if (empty($items)) {
            return [];
        }

        return $this->processItems($items);
    }

    private function processItems(array $items)
    {
        $output = [];

        foreach ($items as &$item) {
            $output[] = [
                'icon' => $this->getItemImage($item, 'icon', 'full'),
                'title' => esc_html($item['title']),
                'content' => wp_kses_post($item['content']),
            ];
        }

        return $output;
    }

}
