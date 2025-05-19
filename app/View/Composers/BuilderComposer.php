<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class BuilderComposer extends Composer
{
    private array $fields;

    public function __construct()
    {
        $this->setupFields();
        $this->proccessFields();
    }

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'builder.fields.builder-advanced'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'fields' => $this->getFields(),
        ];
    }

    private function getFields(): array
    {
        return $this->fields;
    }

    private function setupFields(): void
    {
        if (empty($this->fields)) {
            $fields = get_field('builder');
            $this->fields = is_array($fields) ? $fields : [];
        }
    }

    private function proccessFields()
    {
        if (empty($this->fields)) {
            return;
        }

        foreach ($this->fields as $index => $field) {
            $layout = $this->snakeToCamel(
                $field['acf_fc_layout']
            );

            if (!$this->templateExists($layout)) {
                continue;
            }

            $formattedField = $this->getField($layout, $field);

            if (!is_array($formattedField)) {
                continue;
            }

            $this->fields[$index] = array_merge(
                $formattedField,
                [
                    'acf_fc_layout' => $field['acf_fc_layout']
                ]
            );
        }

    }

    private function getField(string $layout, array $data)
    {
        $namespace = 'App\View\Fields\\';
        $class = $namespace . $this->snakeToCamel($layout);

        if (!class_exists($class)) {
            return;
        }

        $class = (new $class($data));
        return $class();
    }

    private function templateExists(string $layout): bool
    {
        if ($layout === 'Slider') {
            return false;
        }

        $layout = sprintf(
            '%s/%s/%s',
            get_stylesheet_directory(),
            'app/View/Fields',
            $layout . '.php'
        );

        return file_exists($layout);
    }

    private function snakeToCamel($input)
    {
        return str_replace('-', '', ucwords($input, '-'));
    }
}
