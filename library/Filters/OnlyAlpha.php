<?php

namespace PHPCleanup\Filters;

use phpDocumentor\Reflection\Types\Null_;

class OnlyAlpha extends Only {

    private $additionalChars;

    public function __construct(string ...$additionalChars)
    {
        $this->additionalChars = implode($additionalChars);
        $this->setRegex("/([^A-Za-z$this->additionalChars]+)/");
    }
}
