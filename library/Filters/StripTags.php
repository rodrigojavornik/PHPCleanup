<?php

namespace PHPCleanup\Filters;

class StripTags extends AbstractFilter {

    private $allowableTags;

    public function __construct($allowableTags = null)
    {
        $this->allowableTags = $allowableTags;
    }

    public function sanitize($value)
    {
        return strip_tags($value, $this->allowableTags);
    }
}