<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class CapitalizeTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('Is wednesday my dudes', Sanitize::captalize()->sanitize('is wednesday my dudes'));
    }
}
