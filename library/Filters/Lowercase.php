<?php

namespace PHPCleanup\Filters;

class Lowercase extends AbstractFilter {

    public function sanitize($value, string $encoding = null)
    {
        return mb_strtolower($value, $encoding);
    }
}