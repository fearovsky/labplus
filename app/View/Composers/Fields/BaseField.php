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

}
