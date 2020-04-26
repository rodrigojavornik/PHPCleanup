<?php

namespace PHPCleanup\Filters;

class Captalize extends AbstractFilter {

    public function sanitize($value)
    {
        return ucfirst($value);
    }
}