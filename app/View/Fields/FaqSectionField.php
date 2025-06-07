<?php

namespace App\View\Fields;

class FaqSectionField extends BaseField
{
    private string $heading;
    private string $content;
    private array $items = [];


    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'content' => $this->content,
            'items' => $this->items,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->content = $this->getContent();
        $this->items = $this->processAndGetItems();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getContent(): string
    {
        return wp_kses_post($this->field['content'] ?? '');
    }

    protected function processAndGetItems(): array
    {
        if (empty($this->field['list'])) {
            return [];
        }

        $faqItems = get_field('items', $this->field['list'] ?? 0);

        if (empty($faqItems) || !is_array($faqItems)) {
            return [];
        }

        return $faqItems;
    }

}
