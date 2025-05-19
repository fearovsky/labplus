<?php

namespace App\View\Fields;

class HeroField extends BaseField
{
    private string $title;
    private array $products;

    public function __invoke(): array
    {
        return [
            'title' => $this->title,
            'products' => $this->products
        ];
    }

    protected function proccessFields(): void
    {
        $this->title = $this->getTitle();
        $this->products = $this->getProducts();
    }
}
