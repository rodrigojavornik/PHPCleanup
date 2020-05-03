<?php

namespace PHPCleanup\Filters;

class DateTime extends AbstractFilter {

    private $dateFormat;
    private $regex;

    public function __construct($dateFormat = 'Y-m-d H:i:s')
    {
        $this->dateFormat = $dateFormat;
        $this->regex = preg_replace('/([^a-zA-Z\s])/', '\\\\$1', $dateFormat);
        $this->regex = preg_replace('/[a-zA-Z]/', '[0-9]*', $this->regex);
        $this->regex = '/(.*?)('. $this->regex .')(.*)/';
    }

    public function sanitize($value)
    {
        $dateTime = \DateTime::createFromFormat($this->dateFormat, $value);
        
        if ($dateTime === false) {
            $value = preg_replace($this->regex, '$2', $value);
            $dateTime = \DateTime::createFromFormat($this->dateFormat, $value);
        }

        return $dateTime;
    }
}