<?php

namespace PHPCleanup;

final class Sanitaze
{

    private $filters = [];
    private $value;

    public static function __callStatic($filterName, $arguments)
    {
        $sanitazer = self::create();
        $sanitazer->addFilter($filterName, $arguments);
        return $sanitazer;
    }

    public function __call($filterName, $arguments)
    {
        $this->addFilter($filterName, $arguments);
        return $this;
    }

    public static function create(): self
    {
        return new self();
    }

    public function sanitaze($value)
    {
        $this->value = $value;

        foreach ($this->filters as $filterName => $arguments) {
            $this->value = Factory::executeFilter($filterName, $this->value, $arguments);
        }

        return $this->value;
    }

    private function addFilter(string $filterName, array $arguments)
    {
        $this->filters[$filterName] = $arguments;
    }
}
