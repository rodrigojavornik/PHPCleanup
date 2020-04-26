<?php

namespace PHPCleanup\Filters;

class Input extends AbstractFilter {

    public function sanitize($value)
    {
        return strip_tags(trim($value));
    }
}