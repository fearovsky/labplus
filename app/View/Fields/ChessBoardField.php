<?php

namespace App\View\Fields;

class ChessBoardField extends BaseField
{
    private string $heading;
    private array $boardSections;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'boardSections' => $this->boardSections,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->boardSections = $this->getBoardSections();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getBoardSections(): array
    {
        $sections = $this->field['board'] ?? [];
        if (empty($sections)) {
            return [];
        }

        return $this->processBoardSections($sections);
    }

    private function processBoardSections(array $sections): array
    {
        $output = [];

        foreach ($sections as $index => $section) {
            $output[$index] = [
                'pretitle' => $section['pretitle'] ?? null,
                'title' => $section['title'],
                'content' => wp_kses_post($section['content']),
                'summary' => $this->getFieldGroupIfHasKeyWithFields(
                    $section['summary'],
                    'number',
                    [
                        'number',
                        'content',
                    ]
                ),
                'imagePosition' => $section['imagePosition'] ?? 'left',
                'image' => $this->getItemImage(
                    $section,
                    'image',
                    'large'
                ),
                'link' => $section['link'],
            ];
        }

        return $output;
    }
}
