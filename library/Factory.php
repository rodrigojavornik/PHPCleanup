<?php

namespace PHPCleanup;

use ReflectionClass;

final class Factory
{

    private static $filtersNameSpace = "PHPCleanup\Filters\\";

    public static function getFilter($filterName, $arguments = null)
    {
        $className = 'PHPCleanup\Filters\\' . ucfirst($filterName);
        $reflectionClass = self::createReflectionClass($className);
        $instance = $reflectionClass->newInstanceArgs($arguments);
        
        return $instance;
    }

    private static function createReflectionClass($className)
    {
        return new ReflectionClass($className);
    }
}
