<?php

namespace PHPCleanup\Filters;

class Captalize extends AbstractFilter {

    public function sanitize($value)
    {
        $value = mb_strtolower($value);
        return mb_strtoupper(mb_substr($value, 0, 1)) . mb_substr($value, 1);
    }
}