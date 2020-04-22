<?php

namespace PHPCleanup;

final class Factory
{

    private $filtersNameSpace = "PHPCleanup/Filters/";

    public static function executeFilter($filterName, $value, $arguments = null)
    {
        $class = $this->filtersNameSpace . "$filterName()";
        return (new $class)->$filterName($value, $arguments);
    }
}
