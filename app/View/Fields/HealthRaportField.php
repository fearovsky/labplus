<?php

namespace App\View\Fields;

class HealthRaportField extends BaseField
{
    private string $heading;
    private ?int $thumbnailId;


    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'thumbnail' => $this->thumbnailId,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->thumbnailId = $this->getThumbnailId();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getThumbnailId(): ?int
    {
        $thumbnail = get_field('healthRaportThumbnail');
        if (empty($thumbnail)) {
            return null;
        }

        return absint($thumbnail);
    }
}
