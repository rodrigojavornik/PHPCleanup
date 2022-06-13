<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class CapitalizeAllTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('Is Wednesday My Dudes', Sanitize::captalizeAll()->sanitize('is wednesday my dudes'));
    }
}
