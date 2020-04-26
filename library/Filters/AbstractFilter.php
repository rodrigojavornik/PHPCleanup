<?php

namespace PHPCleanup\Filters;

abstract class AbstractFilter {
    public function __construct(){}

    abstract function sanitize($value);
}