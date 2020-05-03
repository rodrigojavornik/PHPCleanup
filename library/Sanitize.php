<?php

namespace PHPCleanup;

use PHPCleanup\Filters\AbstractFilter;
/**
 * @method static Sanitize sanitize() 
 * @method static Sanitize captalize() 
 * @method static Sanitize email() 
 * @method static Sanitize formatNumber($decimalPlace, $decimalSeparator, $thousandsSeparator) 
 * @method static Sanitize input() 
 * @method static Sanitize lowercase() 
 * @method static Sanitize money($locale) 
 * @method static Sanitize onlyAlpha($additionalChars) 
 * @method static Sanitize onlyLatinAlpha($additionalChars) 
 * @method static Sanitize onlyNumbers() 
 * @method static Sanitize trim() 
 * @method static Sanitize uppercase() 
 */
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
