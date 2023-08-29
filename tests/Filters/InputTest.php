<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class InputTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('hello world &', Sanitize::input()->sanitize(' <script>hello world &</script> '));
    }
}
