<?php

namespace App\View\Fields;

abstract class BaseField
{
    protected array $field;

    public function __construct(array $field)
    {
        $this->field = $field;
        $this->proccessFields();
    }

    abstract public function __invoke(): array;

    abstract protected function proccessFields(): void;

    protected function getFieldImage($fieldName, $fieldSize, $index = null): ?array
    {
        if ($index !== null) {
            if (empty($this->field[$fieldName][$index])) {
                return null;
            }

            $image = $this->field[$fieldName][$index] ?? null;
        } else {
            if (empty($this->field[$fieldName])) {
                return null;
            }

            $image = $this->field[$fieldName] ?? null;
        }

        if (empty($image) || empty($image['sizes'])) {
            return null;
        }

        return [
            'url' => $image['sizes'][$fieldSize],
            'alt' => $image['alt'] ?? '',
        ];
    }
}
