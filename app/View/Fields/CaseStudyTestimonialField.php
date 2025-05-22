<?php

namespace App\View\Fields;

class CaseStudyTestimonialField extends BaseField
{
    private string $heading;
    private array $items;

    public function __invoke(): array
    {
        return [
            'heading' => $this->heading,
            'items' => $this->items,
        ];
    }

    protected function proccessFields(): void
    {
        $this->heading = $this->getHeading();
        $this->items = $this->getCaseStudyItems();
    }

    private function getHeading(): string
    {
        return wp_kses_post($this->field['heading'] ?? '');
    }

    private function getCaseStudyItems(): array
    {
        $caseStudyItemId = $this->field['item'] ?? [];
        if (empty($caseStudyItemId)) {
            return [];
        }

        return array_map([$this, 'processItem'], $caseStudyItemId);
    }

    private function processItem(int $caseStudyItemId): array
    {
        $testimonial = get_field('testimonial', $caseStudyItemId);

        return [
            'title' => get_the_title($caseStudyItemId),
            'excerpt' => get_the_excerpt($caseStudyItemId),
            'permalink' => get_permalink($caseStudyItemId),
            'thumbnail' => get_the_post_thumbnail($caseStudyItemId, 'large'),
            'testimonial' => [
                'logo' => $this->getLogo($testimonial),
                'content' => get_field('content', $testimonial),
                'avatar' => $this->getImageBySize(
                    get_field('avatar', $testimonial),
                    'large'
                ),
                'name' => get_field('name', $testimonial),
                'role' => get_field('role', $testimonial),
            ],
        ];
    }

    private function getLogo(?int $Id): ?array
    {
        if (!$Id) {
            return null;
        }

        $logo = get_field('logo', $Id) ?? null;
        if (empty($logo)) {
            return null;
        }

        return $this->getImageBySize($logo, 'full');
    }

}
