<?php

namespace App\View\Fields;

use App\DataFactory\MemberDataFactory;

class ContactFormContentField extends BaseField
{
    private string $heading;
    private string $content;
    private array $contactPerson;
    private ?string $formShortcode;
    private ?string $submissionRedirect;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'content' => $this->content,
            'contactPerson' => $this->contactPerson,
            'formShortcode' => $this->formShortcode,
            'submissionRedirect' => $this->submissionRedirect,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->content = $this->getContent();
        $this->contactPerson = $this->getContactPerson();
        $this->formShortcode = $this->getFormShortcode();
        $this->submissionRedirect = $this->getSubmissionRedirect();
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

    private function getSubmissionRedirect(): ?string
    {
        $redirect = $this->field['submissionRedirect'] ?? null;
        if (!$redirect) {
            return null;
        }

        return get_permalink(absint($redirect));
    }
}
