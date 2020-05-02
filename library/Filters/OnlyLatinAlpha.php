<?php

namespace PHPCleanup\Filters;

use phpDocumentor\Reflection\Types\Null_;

class OnlyLatinAlpha extends Only {

    private $additionalChars = 'À-ÖØ-öø-ÿ';

    public function __construct(string ...$additionalChars)
    {
        $this->additionalChars .= implode($additionalChars);
        $this->setRegex("/([^A-Za-z$this->additionalChars]+)/");
    }
}
