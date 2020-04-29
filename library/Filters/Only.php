<?php

namespace PHPCleanup\Filters;

abstract class Only extends AbstractFilter {

    private $regex;

    public function sanitize($value)
    {
        $result = preg_replace($this->getRegex(), '', $value);

        if ($result === '') {
            return null;
        }

        return $result;
    }

    public function getRegex()
    {
        return $this->regex;
    }

    public function setRegex($regex)
    {
        $this->regex = $regex;
    }
}