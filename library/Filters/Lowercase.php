<?php

namespace PHPCleanup\Filters;

class Lowercase extends AbstractFilter {

    public function sanitize($value)
    {
        return strtolower($value);
    }
}