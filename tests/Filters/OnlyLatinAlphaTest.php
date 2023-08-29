<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class OnlyLatinAlphaTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('Home ç ¨', Sanitize::onlyLatinAlpha()->sanitize('Home ç 1@#$%¨(873469'));
        $this->assertEquals('Home ç ', Sanitize::onlyLatinAlpha()->sanitize('Home ç 123456'));
    }
}
