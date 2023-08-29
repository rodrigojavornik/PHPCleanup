<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class OnlyNumbersTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('1873469', Sanitize::onlyNumbers()->sanitize('Home ç 1@#$%¨(873469'));
        $this->assertEquals('123456', Sanitize::onlyNumbers()->sanitize('Home ç 123456'));
    }
}
