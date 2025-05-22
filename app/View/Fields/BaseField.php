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

    protected function getItemImage(array $item, string $imageKey, $imageSize)
    {
        if (empty($item[$imageKey])) {
            return null;
        }

        $image = $item[$imageKey];

        if (empty($image['sizes'])) {
            return null;
        }

        return [
            'url' => $image['sizes'][$imageSize],
            'alt' => $image['alt'] ?? '',
        ];
    }

    protected function getFieldGroupIfHasKeyWithFields(array $group, string $key, array $groupFields): ?array
    {
        if (empty($group[$key])) {
            return null;
        }

        $output = [];
        foreach ($groupFields as $field) {
            if (empty($group[$field])) {
                continue;
            }

            $output[$field] = $group[$field];
        }

        return $output;
    }

    protected function getImageBySize(?array $image, string $size): ?array
    {

        if (empty($image) || empty($image['sizes'])) {
            return null;
        }

        return [
            'url' => $image['sizes'][$size],
            'alt' => $image['alt'] ?? '',
        ];
    }
}
