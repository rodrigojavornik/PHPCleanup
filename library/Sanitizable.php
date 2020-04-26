<?php

namespace PHPCleanup;

use PHPCleanup\Filters\AbstractFilter;

class Sanitizable {

    private $filters = [];

    public function sanitize($value)
    {
        foreach ($this->getFilters() as $filter) {
            $value = $filter->sanitize($value);
        }

        return $value;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    protected function addFilter(AbstractFilter $filter)
    {
        $this->filters[] = $filter;
    }
}