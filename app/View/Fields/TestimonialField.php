<?php

namespace App\View\Fields;

class TestimonialField extends BaseField
{
    private ?array $logo;
    private string $content;
    private ?array $avatar;
    private string $name;
    private string $role;

    public function __invoke(): array
    {
        return [
            'logo' => $this->logo,
            'content' => $this->content,
            'avatar' => $this->avatar,
            'name' => $this->name,
            'role' => $this->role,
        ];
    }

    protected function proccessFields(): void
    {
        $this->logo = $this->getLogo();
        $this->content = $this->getContent();
        $this->avatar = $this->getAvatar();
        $this->name = $this->getName();
        $this->role = $this->getRole();
    }

    private function getLogo(): ?array
    {
        $logo = get_field('logo', $this->field['item']) ?? null;
        if (empty($logo)) {
            return null;
        }

        return $this->getImageBySize($logo, 'full');
    }

    private function getContent(): string
    {
        return get_field('content', $this->field['item']);
    }

    private function getAvatar(): ?array
    {
        $avatar = get_field('avatar', $this->field['item']);
        if (empty($avatar)) {
            return null;
        }

        return $this->getImageBySize($avatar, 'full');
    }

    private function getName(): string
    {
        return get_field('name', $this->field['item']);
    }

    private function getRole(): string
    {
        return get_field('role', $this->field['item']);
    }
}
