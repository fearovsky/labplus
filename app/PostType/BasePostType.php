<?php

namespace App\PostType;

abstract class BasePostType
{
    abstract public static function getPostType();

    abstract public function getLabels();

    abstract public function getArgs();

    public function registerPostType()
    {
        register_post_type(static::getPostType(), $this->getArgs());
    }
}
