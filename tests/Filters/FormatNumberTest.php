<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class FormatNumberTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('123321123.00', Sanitize::formatNumber(2, '.')->sanitize('123321123sdfasdf'));
        $this->assertEquals('123321123,00', Sanitize::formatNumber(2, ',')->sanitize('123321123sdfasdf'));
        $this->assertEquals('123.321.123,00', Sanitize::formatNumber(2, ',', '.')->sanitize('123321123sdfasdf'));
        $this->assertEquals('123,321,123.00', Sanitize::formatNumber(2, '.', ',')->sanitize('123321123sdfasdf'));
        $this->assertEquals('1,987.700', Sanitize::formatNumber(3, '.', ',')->sanitize('1987.7'));
    }
}