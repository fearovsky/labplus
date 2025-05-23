<?php

namespace App\View\Fields;

use App\DataFactory\MemberDataFactory;

class ContactFormContentField extends BaseField
{
    private string $heading;
    private string $content;
    private array $contactPerson;
    private ?string $formShortcode;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'content' => $this->content,
            'contactPerson' => $this->contactPerson,
            'formShortcode' => $this->formShortcode,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->content = $this->getContent();
        $this->contactPerson = $this->getContactPerson();
        $this->formShortcode = $this->getFormShortcode();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getContent(): string
    {
        return wp_kses_post($this->field['content'] ?? '');
    }

    private function getContactPerson(): array
    {
        $contactPerson = $this->field['contactPerson'];
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

    private function getFormShortcode(): ?string
    {
        $form = $this->field['form'] ?? null;
        if (!$form) {
            return null;
        }

        return sprintf('[contact-form-7 id="%d"]', absint($form));
    }

}
