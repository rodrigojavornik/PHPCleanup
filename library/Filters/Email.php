<?php

namespace PHPCleanup\Filters;

class Email extends AbstractFilter {

    public function sanitize($value)
    {
        return filter_var($value, FILTER_SANITIZE_EMAIL);
    }
}