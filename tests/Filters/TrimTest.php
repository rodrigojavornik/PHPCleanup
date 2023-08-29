<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class UpperCaseTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('blablabla', Sanitize::uppercase()->sanitize(' blablabla '));
    }
}
