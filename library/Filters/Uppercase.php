<?php

namespace PHPCleanup\Filters;

class Uppercase extends AbstractFilter {

    public function sanitize($value, string $encoding = null)
    {
        return mb_strtoupper($value, $encoding);
    }
}