<?php

namespace App\DataFactory;

use App\Utility\ImageUtility;

class MemberDataFactory
{
    private array $avatar;
    private string $name;
    private string $role;
    private ?string $content;
    private ?string $achievements;
    private ?array $socials;
    private ?string $email;
    private ?string $phone;

    public function __construct(private int $memberId)
    {
        $this->processFields();
    }

    public function __invoke()
    {
        return [
            'avatar' => $this->avatar,
            'name' => $this->name,
            'role' => $this->role,
            'content' => $this->content,
            'email' => $this->email,
            'phone' => $this->phone,
            'achievements' => $this->achievements,
            'socials' => $this->socials,
        ];
    }

    private function processFields(): void
    {
        $this->avatar = $this->getAvatar();
        $this->name = $this->getName();
        $this->role = $this->getRole();
        $this->content = $this->getContent();
        $this->email = $this->getEmail();
        $this->phone = $this->getPhone();
        $this->achievements = $this->getAchievements();
        $this->socials = $this->getSocials();
    }

    private function getAvatar(): array
    {
        $avatar = get_field('avatar', $this->memberId);
        if (empty($avatar)) {
            return [];
        }

        return ImageUtility::getImageSize($avatar, 'full');
    }

    private function getName(): string
    {
        return get_field('name', $this->memberId);
    }

    private function getRole(): string
    {
        return get_field('role', $this->memberId);
    }

    private function getContent(): ?string
    {
        return get_field('content', $this->memberId);
    }

    private function getEmail(): ?string
    {
        return get_field('email', $this->memberId);
    }

    private function getPhone(): ?string
    {
        return get_field('phone', $this->memberId);
    }

    private function getAchievements(): ?string
    {
        return get_field('achievements', $this->memberId);
    }

    private function getSocials(): ?array
    {
        $socials = get_field('social-media', $this->memberId);
        if (empty($socials)) {
            return null;
        }

        return $socials;
    }
}
