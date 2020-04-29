<?php

namespace PHPCleanup\Filters;

class Uppercase extends AbstractFilter {

    public function sanitize($value)
    {
        return strtoupper($value);
    }
}