<?php

namespace PHPCleanup\Filters;

class Trim extends AbstractFilter {

    public function sanitize($value)
    {
        return trim($value);
    }
}