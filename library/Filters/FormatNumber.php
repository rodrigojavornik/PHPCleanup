<?php

namespace PHPCleanup\Filters;

class FormatNumber extends AbstractFilter {

    private $decimalPlace;
    private $decimalSeparator;
    private $thousandsSeparator;

    public function __construct($decimalPlace = 2, $decimalSeparator = '.', $thousandsSeparator = null)
    {
        $this->decimalPlace = $decimalPlace;
        $this->decimalSeparator = $decimalSeparator;
        $this->thousandsSeparator = $thousandsSeparator;
    }

    public function sanitize($value)
    {
        if (!is_numeric($value)) {
            $value = (new OnlyNumbers())->sanitize($value);
        }
        
        return number_format($value, $this->decimalPlace, $this->decimalSeparator, $this->thousandsSeparator);
    }
}