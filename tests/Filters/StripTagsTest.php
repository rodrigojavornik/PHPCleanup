<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class StripTagsTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('welcome', Sanitize::stripTags()->sanitize('<html><h1>welcome</h1></html>'));
        $this->assertEquals('<h1>welcome</h1>', Sanitize::stripTags('<h1>')->sanitize('<html><h1>welcome</h1></html>'));
    }
}
