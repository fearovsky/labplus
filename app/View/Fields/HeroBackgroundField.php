<?php

namespace App\View\Fields;

class HeroBackgroundField extends BaseField
{
    private ?array $background;
    private string $heading;
    private string $content;
    private ?array $icon;

    public function __invoke(): array
    {
        return [
            'background' => $this->background,
            'heading' => $this->heading,
            'content' => $this->content,
            'icon' => $this->icon,
        ];
    }

    protected function proccessFields(): void
    {
        $this->background = $this->getFieldImage('background', 'full');
        $this->icon = $this->getFieldImage('icon', 'full');
        $this->heading = $this->getHeading();
        $this->content = $this->getContent();
    }

    private function getHeading(): string
    {
        return $this->field['heading'];
    }

    private function getContent(): string
    {
        return $this->field['content'];
    }
}
