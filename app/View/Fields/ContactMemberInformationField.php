<?php

namespace App\View\Fields;

use App\DataFactory\MemberDataFactory;

class ContactMemberInformationField extends BaseField
{
    private string $title;
    private array $member;

    public function __invoke(): array
    {
        return [
            'title' => $this->title,
            'member' => $this->member,
        ];
    }

    protected function proccessFields(): void
    {
        $this->title = $this->getTitle();
        $this->member = $this->getMember();
    }

    private function getTitle(): string
    {
        return $this->field['title'];
    }

    private function getMember(): array
    {
        $contactPerson = $this->field['member'];
        if (!$contactPerson) {
            return [];
        }

        try {
            $memberData = new MemberDataFactory($contactPerson);
        } catch (\Exception $e) {
            return [];
        }

        return $memberData();
    }
}
