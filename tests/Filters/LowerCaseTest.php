<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class LowerCaseTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('the library of alexandria', Sanitize::lowercase()->sanitize('THE LIBRARY OF ALEXANDRIA'));
    }
}
