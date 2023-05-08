<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class OnlyAlphaTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('Home', Sanitize::onlyAlpha()->sanitize('Home ç 1@#$%¨(873469'));
        $this->assertEquals('Home ç 1', Sanitize::onlyAlpha('ç', '1', ' ')->sanitize('Home ç 123456'));
    }
}
