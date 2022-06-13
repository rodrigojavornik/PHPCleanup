<?php

namespace PHPCleanup\Filters;

class CaptalizeAll extends AbstractFilter {

    public function sanitize($value)
    {
        $value = explode(' ', mb_strtolower($value));
        $string = '';
        $count = count($value);
        
        for ($i = 0; $i < $count; $i++) { 
            $string .= ' '. mb_strtoupper(mb_substr($value[$i], 0, 1)) . mb_substr($value[$i], 1);
        }

        return trim($string);
    }
}