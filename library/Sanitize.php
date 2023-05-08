<?php

namespace PHPCleanup;

use PHPCleanup\Filters\AbstractFilter;
/**
 * @method static Sanitize sanitize() 
 * @method static Sanitize captalize()
 * @method static Sanitize captalizeAll()
 * @method static Sanitize dateTime($dateFormat = 'Y-m-d H:i:s') 
 * @method static Sanitize email() 
 * @method static Sanitize formatNumber($decimalPlace = 2, $decimalSeparator = '.', $thousandsSeparator = null) 
 * @method static Sanitize input() 
 * @method static Sanitize lowercase($encoding = null) 
 * @method static Sanitize money($locale = 'en-US') 
 * @method static Sanitize onlyAlpha($additionalChars = '') 
 * @method static Sanitize onlyLatinAlpha($additionalChars) 
 * @method static Sanitize onlyNumbers() 
 * @method static Sanitize stripTags($allowableTags = null) 
 * @method static Sanitize trim() 
 * @method static Sanitize uppercase($encoding = null)
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
