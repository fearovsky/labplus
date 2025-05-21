<?php

namespace App\View\Fields;

class EasySupportedIntegrationField extends BaseField
{
    private string $heading;
    private array $inNumbers;
    private string $content;
    private array $resource;
    private array $iconsText;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'inNumbers' => $this->inNumbers,
            'content' => $this->content,
            'resource' => $this->resource,
            'iconsText' => $this->iconsText,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->inNumbers = $this->getInNumbers();
        $this->content = $this->getContent();
        $this->resource = $this->getResource();
        $this->iconsText = $this->getIconsText();
    }

    private function getHeading(): string
    {
        return $this->field['heading'];
    }

    private function getInNumbers(): array
    {
        $inNumbers = $this->field['inNumbers'] ?? [];
        if (empty($inNumbers)) {
            return [];
        }

        return $inNumbers;
    }

    private function getContent(): string
    {
        $content = $this->field['content'] ?? '';
        if (empty($content)) {
            return '';
        }

        return wp_kses_post($content);
    }

    private function getResource(): array
    {
        $resource = $this->field['resource'] ?? [];
        if (empty($resource)) {
            return [];
        }

        return $resource;
    }

    private function getIconsText(): array
    {
        $iconsText = $this->field['iconsText'] ?? [];
        if (empty($iconsText)) {
            return [];
        }

        return $this->processIconsText($iconsText);
    }

    private function processIconsText(array $iconsText): array
    {
        $output = [];

        foreach ($iconsText as &$item) {
            $output[] = [
                'icon' => $this->getItemImage($item, 'icon', 'full'),
                'content' => wp_kses_post($item['content']),
            ];
        }

        return $output;
    }
}
