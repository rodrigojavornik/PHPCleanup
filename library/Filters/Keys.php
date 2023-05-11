<?php

namespace PHPCleanup\Filters;

class Keys extends AbstractFilter {

    private $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function sanitize($list)
    {
        foreach ($this->filters as $key => $filter) {

            if (!array_key_exists($key, $list)) {
                continue;
            }

            $list[$key] = $filter->sanitize($list[$key]);
        }

        return $list;
    }
}