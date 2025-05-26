<?php

namespace App\Taxonomy;

abstract class BaseTaxonomy
{
    /**
     * Get the taxonomy name.
     *
     * @return string
     */
    abstract public static function getTaxonomy();

    /**
     * Get the post type associated with the taxonomy.
     *
     * @return string
     */
    abstract public function getPostType();

    /**
     * Get the labels for the taxonomy.
     *
     * @return array
     */
    abstract public function getLabels();

    /**
     * Get the arguments for registering the taxonomy.
     *
     * @return array
     */
    abstract public function getArgs();

    /**
     * Register the taxonomy.
     */
    public function registerTaxonomy(): void
    {
        register_taxonomy(static::getTaxonomy(), $this->getPostType(), $this->getArgs());
    }
}
