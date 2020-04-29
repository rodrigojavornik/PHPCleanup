<?php

namespace PHPCleanup\Filters;

use phpDocumentor\Reflection\Types\Null_;

class OnlyNumbers extends Only {

    public function __construct()
    {
        $this->setRegex('/\D/');
    }
}
