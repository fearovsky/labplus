<?php

namespace App\View\Fields;

use App\DataFactory\MemberDataFactory;

class OurTeamField extends BaseField
{
    private string $heading;
    private ?string $content;
    private ?string $title;
    private array $groups;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'title' => $this->title,
            'content' => $this->content,
            'groups' => $this->groups
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->title = $this->getTitle();
        $this->content = $this->getContent();
        $this->groups = $this->getGroups();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getTitle(): ?string
    {
        if (empty($this->field['title'])) {
            return null;
        }

        return wp_kses_post($this->field['title']);
    }

    private function getContent(): string
    {
        if (empty($this->field['content'])) {
            return '';
        }

        return wp_kses_post($this->field['content']);
    }

    private function getGroups(): array
    {
        if (empty($this->field['team']) || !is_array($this->field['team'])) {
            return [];
        }


        $groups = [];
        foreach ($this->field['team'] as $group) {
            $groups[] = [
                'title' => $group['title'] ?? '',
                'members' => $this->transferMembers($group['members'] ?? [])
            ];
        }

        return $groups;
    }

    private function transferMembers(array $members): array
    {
        $output = [];
        foreach ($members as $member) {
            $avatar = get_field('avatar', $member);
            if (empty($avatar) || empty($avatar['sizes'])) {
                continue;
            }

            $output[] = [
                'id' => $member,
                'image' => $this->getImageBySize($avatar, 'full')
            ];
        }

        return $output;
    }
}
