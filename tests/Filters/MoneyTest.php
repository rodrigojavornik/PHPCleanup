<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class MoneyTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('$123,456.00', Sanitize::money()->sanitize('123456'));
    }
}
