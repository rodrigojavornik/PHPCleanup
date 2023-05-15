<?php

namespace PHPCleanup\Filters;

class Escape extends AbstractFilter {

    public function sanitize($value)
    {
        return is_string($value) ? htmlspecialchars($value) : $value;
    }
}