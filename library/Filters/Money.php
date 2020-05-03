<?php

namespace PHPCleanup\Filters;

use NumberFormatter;

class Money extends AbstractFilter {

    private $moneyFormatter;
    private $moneySymbol;

    public function __construct($locale = 'en-US')
    {
        $this->moneyFormatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        $this->moneySymbol = $this->moneyFormatter->getSymbol(NumberFormatter::INTL_CURRENCY_SYMBOL);
    }

    public function sanitize($value)
    {
        return $this->moneyFormatter->formatCurrency($value, $this->moneySymbol);
    }
}