<?php

namespace PHPCleanup;

use PHPCleanup\Filters\AbstractFilter;

final class Sanitize extends Sanitizable {

    public static function __callStatic($filterName, $arguments)
    {
        return self::create()->__call($filterName, $arguments);
    }

    public function __call($filterName, $arguments)
    {

        $filterInstance = Factory::getFilter($filterName, $arguments);
        $this->addFilter($filterInstance);

        return $this;
    }

    public static function create(): self
    {
        return new self();
    }
}
