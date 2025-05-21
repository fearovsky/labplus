<?php

namespace App\View\Fields;

class MembersField extends BaseField
{
    private string $heading;
    private array $members;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'members' => $this->members,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->members = $this->getMembers();
    }

    private function getHeading(): string
    {
        return $this->field['heading'];
    }

    private function getMembers(): array
    {
        $members = $this->field['members'] ?? [];
        if (empty($members)) {
            return [];
        }

        return $this->processMembers($members);
    }

    private function processMembers(array $members)
    {
        $output = [];

        foreach ($members as &$member) {
            $output[] = [
                'name' => get_field('name', $member),
                'content' => wp_kses_post(get_field('content', $member)),
                'achievements' => wp_kses_post(get_field('achievements', $member)),
                'avatar' => $this->getImageBySize(
                    get_field('avatar', $member) ?: [],
                    'full'
                ),
            ];
        }

        return $output;
    }
}
