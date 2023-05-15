<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class EscapeTest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('&lt;script&gt;is wednesday my dudes &amp;&lt;/script&gt;', Sanitize::escape()->sanitize('<script>is wednesday my dudes &</script>'));
    }
}
