<?php


declare(strict_types = 1)
;

namespace Tests\Filters;

use PHPCleanup\Sanitize;
use PHPUnit\Framework\TestCase;

final class OnlyASCIITest extends TestCase {

    public function testCanBeCreatedFromValidString()
    {
        $this->assertEquals('RjgPQlLs7TE', Sanitize::onlyASCII()->sanitize('RjÜgPQlLs7àTéE'));
        $this->assertEquals('wNvJ3f9TkZD', Sanitize::onlyASCII()->sanitize('wNvJ3f9üÜTßèkZD'));
        $this->assertEquals('5PmXa1bCLrS', Sanitize::onlyASCII()->sanitize('5PmXa1ÉbCñLòrS'));
        $this->assertEquals('o7RgHMQ1F2v', Sanitize::onlyASCII()->sanitize('oÜ7RgHàMÑQ1F2v'));
    }
}
